<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = 'category';
    protected $fillable=[
        'cat_name',
        'slug',
        'parent_id',
        'type',
        'author',
        'status',
        'created_at',
        'update_at',
        'deleted_at'
    ];
}