<?php
/**
 * Created by PhpStorm.
 * User: inComesCrane
 * Date: 2/9/2020
 * Time: 5:28 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}