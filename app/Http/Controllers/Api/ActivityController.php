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
    public function index()
    {
        $activities = Activity::latest()->paginate(5);
        return new ActivityResource(true, 'List of activities', $activities);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'created_by' => 'required',
        ]);

        if ($validator->fails()){
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

    public function show($id_activity)
    {
        $activity = Activity::findOrFail($id_activity);
        return new ActivityResource(true, 'Detail Activity', $activity);
    }

    public function update(Request $request, $id_activity)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'created_by' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $activity = Activity::findOrFail($id_activity);

        if ($request->hasFile('image')) {
            
            $image = $request->file('image');
            $image->storeAs('public/activities', $image->hashName());

            Storage:delete('public/activities/' . basename($activity->image));

            $activity->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'created_by' => $request->created_by,
            ]);
        }else{
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
        $activity = Activity::findOrFail($id_activity);

        Storage::delete('public/activities/' . basename($activity->image));

        $activity->delete();

        return new ActivityResource(true, 'Activity Deleted', null);
    }
}
