<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyBid extends Model
{
    use HasFactory;
    protected $table = 'property_bid';
    protected $primaryKey = 'property_bid_id';

    protected $fillable = [
        'property_id',
        'proposal_description',
        'property_status',
        'submitted_by',
    ];
}
