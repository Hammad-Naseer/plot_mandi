<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealarMedia extends Model
{
    use HasFactory;

    protected $primaryKey = 'dealer_media_id';
    protected $fillable = [
        'dealer_id',
        'dealer_office_picture',
        'dealer_office_video',
        'dealer_office_document'
    ];
}
