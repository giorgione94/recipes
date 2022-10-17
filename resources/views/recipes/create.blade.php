@extends('layouts.app')
@include('errors')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-control bg-gradient create">
                    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="title" class="form-label ">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-2">
                            <label for="file" class="form-label ">Cover_Image</label>
                            <input type="file" name="cover_image" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="body" class="form-label ">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                       
                        <div class="mb-2">
                            <label for="category_id" class="form-label ">Choose Category</label>
                            <select class="form-select" id="inputGroupSelect01" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection