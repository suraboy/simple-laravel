<?php

namespace App\Repositories\Product;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Product;

/**
 * Class ProductRepository
 * @package namespace App\Repositories;
 */
class ProductRepository extends BaseRepository implements ProductInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }
}

