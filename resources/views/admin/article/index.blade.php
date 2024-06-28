<?php
/** @var \App\Models\Article[] $articles */
?>

@extends('layout')

@section('content')
    <section class="settings">
        <div class="container">
            <h3>Articles</h3>
            <a href="{{route('admin.article.create')}}" class="btn btn-primary">Create</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->id }}</th>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->content }}</td>
                        <td>
                            <x-edit-button :model="$article" routeName="admin.article.edit"/>
                            <x-delete-button :model="$article" routeName="admin.article.destroy"/>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

