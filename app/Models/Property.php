<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property';
    protected $primaryKey = 'property_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'property_title',
        'property_description',
        'property_status',
        'property_type',
        'property_rooms',
        'property_price',
        'property_area',
        'property_address',
        'property_city',
        'property_state',
        'property_country',
        'property_latitude',
        'property_langitude',
        'property_kitchens',
        'property_bathrooms',
        'property_features',
        'property_contact_name',
        'property_contact_email',
        'property_contact_phone',
    ];
}
