<?php
/** @var \App\Models\Settings[] $settings */
?>

@extends('layout')

@section('content')
    <section class="settings">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="margin-top: 30px; margin-bottom: 30px">
                    <div class="card">
                        <div class="card-header">{{ __('Settings') }}</div>

                        <div class="card-body">
                            @foreach($settings as $setting)
                                <form method="POST" action="{{ route('admin.settings.update', $setting) }}" style="margin-bottom: 50px">
                                    @csrf
                                    @method('PATCH')
                                    <x-input-text
                                        field="title"
                                        value="{{ $setting->title }}"
                                        readonly/>
                                    <x-input-text
                                        field="value"
                                        value="{{ $setting->value }}"/>
                                    <x-submit-button name="Update" />
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

