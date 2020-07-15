<?php

namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

/**
 * Class BaseRepository
 *
 * @package \App\Repositories
 */
class BaseRepository implements BaseContract
{
    /**
     * @var Model
     */
    protected $model;
    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
    /**
     * @param array $attributes
     * @param int $id
     * @return bool
     */
    public function update(array $attributes, int $id): bool
    {
        return $this->find($id)->update($attributes);
    }
    /**
     * Return list model rows
     * @param int $skip
     * @param int $take
     * @param array $columns
     * @param string $orderBy
     * @param string $orderDirection
     * @param array $relationship
     * @param array $filter
     * @param array $columns
     * @param array $search
     * @return mixed
     */
    public function list(int $skip = 0, int $take = 10, string $orderBy = 'id', string $orderDirection = 'asc', array $relationship = [], array $filter = [], $columns = array('*'), $search = null, $join = null)
    {
        return $this->model->with($relationship)->when($search, function ($query, $search) {
            foreach ($search as $key => $value) {
                $query->orWhere($key, "like", "%$value%");
            }

            return $query;
        })
            ->when($join, function ($query, $join) {
                foreach ($join as $table => $foreing) {
                    $query->join($table, $table . ".id", "=", $foreing);
                }
            })
            ->where($filter)
            ->skip($skip)
            ->take($take)
            ->orderBy($orderBy, $orderDirection)
            ->get($columns);
    }
    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }
    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }
    /**
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data)
    {
        return $this->model->where($data)->all();
    }
    /**
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }
    /**
     * @param array $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }
    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->find($id)->delete();
    }
}
