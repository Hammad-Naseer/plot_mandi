<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot_Pedia extends Model
{
    use HasFactory;
    protected $primaryKey = 'plot_pedias_id';
    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'created_by'
    ];
}
