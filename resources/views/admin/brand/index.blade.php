@extends('layout')

@section('content')
    <section class="brand">
        <div class="container">
            <h3>Brands</h3>
{{--            <a href="{{route('admin.brand.create')}}" class="btn btn-primary">Create</a>--}}
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <th scope="row">{{ $brand->id }}</th>
                        <td>{{ $brand->name }}</td>
                        <td>
{{--                            <x-edit-button :model="$brand" routeName="admin.brand.edit"/>--}}
                            <x-delete-button :model="$brand" routeName="admin.brand.destroy"/>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
