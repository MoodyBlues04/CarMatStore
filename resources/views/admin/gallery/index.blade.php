<?php
/** @var \App\Models\Gallery[] $galleryImages */
?>

@extends('layout')

@section('content')
    <section class="gallery">
        <div class="container">
            <h3>Gallery</h3>
            <a href="{{route('admin.gallery.create')}}" class="btn btn-primary">Create</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($galleryImages as $galleryImage)
                    <tr>
                        <th scope="row">{{ $galleryImage->id }}</th>
                        <td><img src="{{ $galleryImage->image->getPublicUrl() }}" alt="image"></td>
                        <td>
                            <x-delete-button :model="$galleryImage" routeName="admin.gallery.destroy"/>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
