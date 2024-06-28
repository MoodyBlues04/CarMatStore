<?php
/** @var \App\Models\Article $article */
?>

@extends('layout')

@section('content')
    <section class="settings">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="margin-top: 30px; margin-bottom: 30px">
                    <div class="card">
                        <div class="card-header">{{ __('Create article') }}</div>

                        <form method="POST" action="{{ route('admin.article.update', $article) }}"
                              style="margin-bottom: 50px">
                            @csrf
                            @method('PATCH')
                            <x-input-text field="title" value="{{$article->title}}"/>
                            <x-input-textarea field="content" value="{{$article->content}}"/>
                            <x-submit-button name="Create"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

