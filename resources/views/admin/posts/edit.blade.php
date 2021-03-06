@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Modifica l'articolo: {{ $post->title }}</h1>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Inserire titolo articolo" name="title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Testo articolo</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="6" name="content" placeholder="Inserire testo articolo">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="cover">Copertina post</label>

                @if ($post->cover)
                    <div class="mb-3">
                        <img style="width: 200px" src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}">
                    </div>
                @endif

                <input type="file" name="cover" class="form-control-file" id="cover">
                @error('cover')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-froup">
                <label for="category_id">Categoria</label>
                <select class="form-control mb-4 @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="">Seleziona un categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ ($category->id == old('category_id', $post->category_id)) ? 'selected' : '' }} >{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-5">
                <div>Tags</div>
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        @if ($errors->any())
                            <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} >
                        @else
                            <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'checked' : '' }} >
                        @endif
                        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                @endforeach
                @error('tags')
                    <div>
                        <small class="text-danger">{{ $message }}</small>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
            <a class="btn btn-secondary ml-2" href="{{ route('admin.posts.index') }}">Elenco Post</a>
        </form>
    </div>
@endsection