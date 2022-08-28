<?php

namespace Blog\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    public $dates = ['published_at'];

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'description',
        'category',
        'image_url',
        'published_at',
    ];
}
