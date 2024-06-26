<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @author Sirichai Janpan <sirichai.jann@gmail.com>
 */
class Product extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $connection = 'mongodb';
    /**
     * @var string
     */
    protected $collection = 'products';
    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'base_price', 'stock_total', 'sale_price'
    ];
}
