<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $includeInvoices = 'includeInvoices';

    public function getRouteKeyName()
    {
        return 'postal_code'; //if you want to hide the customer ID and instean use other model attributes;
    }

    protected $fillable = [
        'name',
        'type',
        'email',
        'address',
        'city',
        'state',
        'postal_code'
    ];

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
