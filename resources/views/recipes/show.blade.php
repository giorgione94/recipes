@extends('layouts.app')

@section('content')
    <div class="container form-control">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="m-3">
                    <img src="{{ asset('images/recipes/' . $recipe->cover_image) }}" class="img-fluid" alt="...">

                    <h1 class="text">{{ $recipe->title }}</h1>

                    <p>{!! $recipe->body !!}</p>

                    <p class="card-text">
                        <small class="text">
                            {{ $recipe->user->name }} |
                            {{ $recipe->category->title }} |
                            {{ $recipe->publication_date }}
                        </small>
                    </p>
                    <like :recipe-id="{{ $recipe->id}}" :user-id="{{ Auth::User()->id }}"></like>
                </div>
            </div>
        </div>
    </div>
@endsection
