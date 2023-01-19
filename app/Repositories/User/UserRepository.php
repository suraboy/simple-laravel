<?php

namespace App\Repositories\User;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\User;

/**
 * Class UserRepository
 * @package namespace App\Repositories;
 */
class UserRepository extends BaseRepository implements UserInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}

