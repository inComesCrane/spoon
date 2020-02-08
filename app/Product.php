<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'description','image'
    ];
    public function OrderProduct()
    {
        return $this->belongsTo(OrderProduct::class);
    }
    public function ProductOption()
    {
        return $this->hasOne(ProductOption::class);
    }
    public function ProductType()
    {
        return $this->hasMany(ProductType::class);
    }

}
