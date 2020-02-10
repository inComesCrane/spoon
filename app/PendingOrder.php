<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class PendingOrder extends Model
{
    protected $fillable = [
        'order_key',
        'name',
        'last_name',
        'email',
        'address_1',
        'address_2',
        'city',
        'zip',
        'logged_in'
    ];
}