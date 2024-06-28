<?php

namespace App\Repositories;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    private Builder $query;

    public function __construct(Builder|Model|string $model)
    {
        if (is_string($model) || is_subclass_of($model, Model::class)) {
            $this->query = $model::query();
        } else {
            $this->query = $model;
        }
    }

    public function create(array $attributes): Builder|Model
    {
        return $this->query->create($attributes);
    }

    public function update(array $attributes, Model $model): bool
    {
        return $model->update($attributes);
    }

    public function updateFromRequest(UpdateRequest $request, Model $model): bool
    {
        return $this->update($request->getDataToUpdate(), $model);
    }

    public function createFromRequest(CreateRequest $request): Builder|Model
    {
        return $this->create($request->getDataToCreate());
    }

    /**
     * @return Model[]
     */
    public function getAll(): array
    {
        return $this->query->get()->all();
    }

    public function exists(array $conditions): bool
    {
        return $this->getBy($conditions)->exists();
    }

    public function firstBy(array $conditions): ?Model
    {
        return $this->getBy($conditions)->first();
    }

    /**
     * @param array $conditions
     * @return Model[]
     */
    public function allBy(array $conditions): array
    {
        return $this->getBy($conditions)->get()->all();
    }

    public function getBy(array $conditions): ?Builder
    {
        return $this->query->where($conditions);
    }
}
