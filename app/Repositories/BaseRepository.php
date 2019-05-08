<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 2/2/19
 * Time: 8:24 AM
 */
abstract class BaseRepository implements IBaseRepository
{
// model property on class instances
    protected $model;
}
