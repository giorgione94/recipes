@extends('layouts.app')
@include('errors')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-control bg-gradient edit">

                    <form action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label ">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $recipe->title }}">
                        </div>

                        <div class="mb-3">
                            <img src="{{ asset('images/recipes/' . $recipe->cover_image) }}"
                                class="card-img-top img-thumbnail w-25" alt="...">
                            <label for="file" class="form-label">Cover_Image</label>
                            <input type="file" name="cover_image" class="form-control mt-3">
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label ">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control ckeditor">{{ $recipe->body }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label ">Choose Category</label>
                            <select class="form-select" id="inputGroupSelect01" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($recipe->category_id == $category->id) selected @endif>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
        CKEDITOR.replace('body', {
            filebrowserUploadUrl: "{{ route('ckeditor.image-upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
