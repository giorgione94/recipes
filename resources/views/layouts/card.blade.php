<div class="col">
    <div class="card m-3 card-food">
        <img src="{{ asset('images/recipes/' . $recipe->cover_image) }}" class="cover imgBox" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $recipe->title }}</h5>
            <p class="card-subtitle crop-text-3">{{ $recipe->subtitle }}</p>
            <p class="card-text">
                <small class="text-muted">
                    <a href="{{ route('chef', $recipe->user->id) }}">
                        {{ $recipe->user->name }}
                    </a>
                    |
                    <a href="{{ route('categories.show', $recipe->category) }}">
                        {{ $recipe->category->title }}</a>
                </small>
            </p>
            <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-secondary bg-gradient">
                Read More
            </a>

            <div class="mt-2">
                <like :recipe-id="{{ $recipe->id }}" :likes="{{ count($recipe->likes) }}"
                    @if (Auth::check()) :user-id="{{ Auth::id() }}" @else :user-id="0" @endif>
                </like>
            </div>
        </div>
    </div>
</div>
