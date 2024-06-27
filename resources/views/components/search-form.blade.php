<?php
/** @var string $field */
/** @var string $routeName */
?>

<form method="GET" action="{{ route($routeName) }}">
    <input id="{{ $field }}" type="text" class="form-control @error('{{ $field }}') is-invalid @enderror"
        name="{{ $field }}" autofocus placeholder="find by {{ $field }}">
</form>
