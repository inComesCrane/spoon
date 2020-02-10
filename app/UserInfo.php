<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'city',
        'zip',
        'address_1',
        'address_2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}