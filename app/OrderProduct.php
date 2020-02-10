<?php
/**
 * Created by PhpStorm.
 * User: inComesCrane
 * Date: 2/9/2020
 * Time: 3:38 PM
 */

namespace App;


class OrderProduct
{
    protected $fillable = [
        'order_id',
        'product_id',
        'amount',
    ];
}