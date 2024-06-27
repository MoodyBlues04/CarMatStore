<?php

/** @var Model $model */
/** @var string $routeName */
/** @var mixed $routeParams */
?>

<a href="{{ route($routeName, $routeParams) }}" class="btn btn-danger"
    onclick="
            event.preventDefault();
            document.getElementById('delete-form-{{ $model->id }}').submit();
        ">
    Delete
</a>

<form id="delete-form-{{ $model->id }}" action="{{ route($routeName, $routeParams) }}" method="POST"
    style="display: none;">
    @csrf
    @method('delete')
</form>
