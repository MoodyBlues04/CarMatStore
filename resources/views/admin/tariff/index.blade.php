<?php
/** @var \App\Models\MatTariff[] $tariffs */
?>

@extends('layout')

@section('content')
    <section class="article">
        <div class="container">
            <h3>Tariffs</h3>
            <a href="{{route('admin.tariff.create')}}" class="btn btn-primary">Create</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    {{--                    <th scope="col">Actions</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($tariffs as $tariff)
                    <tr>
                        <th scope="row">{{ $tariff->id }}</th>
                        <td>{{ $tariff->name }}</td>
{{--                        <td>--}}
{{--                            <x-edit-button :model="$tariff" routeName="admin.tariff.edit"/>--}}
{{--                            <x-delete-button :model="$tariff" routeName="admin.tariff.destroy"/>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

