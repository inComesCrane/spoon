<?php
/**
 * Created by PhpStorm.
 * User: inComesCrane
 * Date: 2/9/2020
 * Time: 3:38 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description','image'
    ];
    public function OrderProduct()
    {
        return $this->belongsTo(OrderProduct::class);
    }
    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }
    public function ProductType()
    {
        return $this->hasMany(ProductType::class);
    }
}