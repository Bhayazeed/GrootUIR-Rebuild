<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */

     protected $primaryKey = 'id_project';

     protected $fillable = [
        'title',
        'image',
        'description',
        'tags',
     ];

     protected function image(): Attribute
     {
        return Attribute::make(
            get: fn ($image) => url ('/storage/posts/' . $image),
        );
     }
}
