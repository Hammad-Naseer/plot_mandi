<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $primaryKey = 'post_id';
    protected $fillable = [
        'post_id',
        'title',
        'type',
        'status',
        'created_by',
    ];
}
