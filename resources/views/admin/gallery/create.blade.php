@extends('layout')

@section('content')
    <section class="settings">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="margin-top: 30px; margin-bottom: 30px">
                    <div class="card">
                        <div class="card-header">{{ __('Create gallery image') }}</div>

                        <form method="POST" action="{{ route('admin.gallery.store') }}"
                              enctype="multipart/form-data"
                              style="margin-bottom: 50px">
                            @csrf
                            <x-input-file field="image"/>
                            <x-submit-button name="Create"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

