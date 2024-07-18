<?php
/** @var \App\Models\Image[] $images */
?>

@extends('layout')

@section('content')
    <section class="gallery">
        <div class="container">
            <h3>Images</h3>
            <a href="{{route('admin.image.create')}}" class="btn btn-primary">Create</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Image url</th>
                </tr>
                </thead>
                <tbody>
                @foreach($images as $image)
                    <tr>
                        <th scope="row">{{ $image->id }}</th>
                        <td><img src="{{ $image->getPublicUrl() }}" style="max-width: 500px" alt="image"></td>
                        <td>{{ $image->getPublicUrl() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
