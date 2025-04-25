<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <h1 class="mb-4">Expediction Blog</h1>

        @if ($posts->count())
            @foreach($posts as $post)
                <div class="card mb-4">
                    <div class="row g-0">
                        @if($post->image_path)
                        <div class="col-md-4">
                            <a href="{{ route('blog.show', $post) }}">
                                <img src="{{ asset('storage/' . $post->image_path) }}" class="img-fluid rounded-start" alt="{{ $post->title }}">
                            </a>
                        </div>
                        @endif
                        <div class="{{ $post->image_path ? 'col-md-8' : 'col-md-12' }}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('blog.show', $post) }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                                </h5>
                                <p class="card-text"><small class="text-muted">Published {{ $post->published_at->diffForHumans() }} by {{ $post->user->name }}</small></p>
                                <p class="card-text">{{ $post->excerpt ?: Str::limit(strip_tags($post->body), 150) }}</p>
                                <a href="{{ route('blog.show', $post) }}" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Pagination Links --}}
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>

        @else
            <p>No blog posts published yet.</p>
        @endif
    </div>
</x-app-layout>
