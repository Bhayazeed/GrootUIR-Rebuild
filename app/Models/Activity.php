<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */

     protected $primaryKey = 'id_activity';

     protected $fillable = [
        'title',
        'image',
        'description',
        'category',
        'created_by',
     ];

     protected function image(): Attribute
     {
        return Attribute::make(
            get: fn ($image) => url ('/storage/posts/' . $image),
        );
     }
}
