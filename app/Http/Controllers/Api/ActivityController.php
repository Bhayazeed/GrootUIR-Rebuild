<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Http\Resources\ActivityResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    // Public methods (no authentication required)
    public function index(Request $request)
    {
        $query = Activity::query();

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }
        if ($request->has('created_by')) {
            $query->where('created_by', $request->created_by);
        }

        $sortField = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');
        $allowedSortFields = ['title', 'category', 'created_at'];
        
        if (in_array($sortField, $allowedSortFields)) {
            $query->orderBy($sortField, $sortDirection);
        }

        $perPage = $request->get('per_page', 15);
        $activities = $query->paginate($perPage);

        return new ActivityResource(true, 'List of activities', $activities);
    }

    public function show($id_activity)
    {
        $activity = Activity::find($id_activity);

        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => 'Activity not found',
            ], 404);
        }

        return new ActivityResource(true, 'Detail Activity', $activity);
    }

    // Protected methods (require authentication)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'created_by' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');
        $image->storeAs('public/activities', $image->hashName());

        $activity = Activity::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'created_by' => $request->created_by,
        ]);

        return new ActivityResource(true, 'Activity Created', $activity);
    }

    public function update(Request $request, $id_activity)
    {
        $activity = Activity::find($id_activity);

        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => 'Activity not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'created_by' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/activities', $image->hashName());

            Storage::delete('public/activities/' . basename($activity->image));

            $activity->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'created_by' => $request->created_by,
            ]);
        } else {
            $activity->update([
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'created_by' => $request->created_by,
            ]);
        }

        return new ActivityResource(true, 'Activity Updated', $activity);
    }

    public function destroy($id_activity)
    {
        $activity = Activity::find($id_activity);

        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => 'Activity not found',
            ], 404);
        }

        Storage::delete('public/activities/' . basename($activity->image));
        $activity->delete();

        return new ActivityResource(true, 'Activity Deleted', null);
    }
}