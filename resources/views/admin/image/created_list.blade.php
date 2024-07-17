<?php
/** @var string[] $imageUrls */
?>

@extends('layout')

@section('content')
    <section class="gallery">
        <div class="container">
            <h3>Created images</h3>
            <h5>Compact list:</h5>
            <p>
             <?= implode("<br>", $imageUrls) ?>
            </p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Url</th>
                </tr>
                </thead>
                <tbody>
                @foreach($imageUrls as $idx => $imageUrl)
                    <tr>
                        <th scope="row">{{ $idx+1 }}</th>
                        <td><img src="{{ $imageUrl }}" alt="image"></td>
                        <td>{{ $imageUrl }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
