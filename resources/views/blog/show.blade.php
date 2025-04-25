<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                {{-- Post Image --}}
                @if($post->image_path)
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="img-fluid rounded mb-4">
                @endif

                <h1 class="mb-3">{{ $post->title }}</h1>
                <p class="text-muted mb-4">
                    Published on {{ $post->published_at->format('M d, Y') }} by {{ $post->user->name }}
                </p>
                <hr class="my-4">
                <div class="blog-body">
                    {!! nl2br(e($post->body)) !!}
                </div>

                <div class="mt-5">
                    <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">&laquo; Back to Blog</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
