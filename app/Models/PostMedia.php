<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMedia extends Model
{
    use HasFactory;
    protected $primaryKey = 'post_media_id';
    protected $fillable = [
        'post_id',
        'office_picture',
        'office_document',
        'office_video',
        'file_type',
    ];
}
