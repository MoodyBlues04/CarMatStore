<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

abstract class BaseEditButton extends Component
{
    public Model $model;
    public string $routeName;
    public mixed $routeParams;

    /**
     * Create a new component instance.
     */
    public function __construct(
        Model $model,
        string $routeName,
        ?array $routeParams = null
    ) {
        $this->model = $model;
        $this->routeName = $routeName;
        $this->routeParams = $routeParams ?? $model;
    }
}
