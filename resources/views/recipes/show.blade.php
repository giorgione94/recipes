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
                    <form action="{{ route('likes.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-suit-heart"></i></button>
                        <span>{{ count($recipe->likes) }}</span>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
