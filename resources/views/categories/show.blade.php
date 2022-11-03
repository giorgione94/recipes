@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="m-3">
                    <img src="{{ asset('images/categories/' . $category->cover_image) }}"
                        class="card-img-top img-thumbnail img categoryImg" alt="...">

                    <h1 class="mt-3">{{ $category->title }}</h1>
                    <h2>{{ $category->subtitle }}</h2>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-4">
                        @foreach ($recipes as $recipe)
                            @include('layouts.card')
                        @endforeach
                    </div>
                    <div class="pagination justify-content-center">
                        {{$recipes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
