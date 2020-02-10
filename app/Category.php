<?php
/**
 * Created by PhpStorm.
 * User: inComesCrane
 * Date: 2/10/2020
 * Time: 6:57 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories')->using(ProductCategory::class);
    }

}