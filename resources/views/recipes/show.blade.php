@extends('layouts.app')

@section('content')
    <div class="container form-control">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="m-3">
                    <img src="{{ asset('images/recipes/' . $recipe->cover_image) }}" class="img-fluid" alt="...">

                    <h1 class="text mt-3">{{ $recipe->title }}</h1>

                    <p>{!! $recipe->body !!}</p>

                    <p class="card-text">
                        <small class="text">
                            <a href="{{ route('chef', $recipe->user->id) }}">
                                {{ $recipe->user->name }}
                            </a> |
                            <a href="{{ route('categories.show', $recipe->category) }}">
                                {{ $recipe->category->title }}
                            </a>
                        </small>
                    </p>

                    <like :recipe-id="{{ $recipe->id }}" :likes="{{ count($recipe->likes) }}"
                        @if (Auth::check()) :user-id="{{ Auth::id() }}" @else :user-id="0" @endif>
                    </like>
                    <br>
                    <div class="form-control">
                        <list-view :recipe-id="{{ $recipe->id }}" :comments="{{ $recipe->comments }}" />
                    </div>
                    <br>
                    <add-comment-form :recipe-id="{{ $recipe->id }}" class="form-control"
                        @if (Auth::check()) :user-id="{{ Auth::id() }}" @else :user-id="0" @endif >
                    </add-comment-form>
                    
                   



                </div>
            </div>
        </div>
    </div>
@endsection
