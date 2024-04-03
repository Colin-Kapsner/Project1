@extends('layouts.app')
@section('content')

<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <h2 class="modal-title">Detail View</h2>
        <div class="modal-body">
            <div>
                <label for="title">Title:</label>
                <p>{{ $movie->title }}</p>
            </div>
            <div>
                <label for="rating">Rating:</label>
                <p>{{ $movie->rating }}</p>
            </div>
            <div class="mb-3">
                <label class="mt-3">Genres:</label>
                <ul>
                @foreach ($movie->genres as $genre) 
                    <li>{{ $genre->genre }}</li>
                @endforeach
                </ul>
            </div>
            <div>
            <label class="mt-3">Images:</label><br>
                @foreach ($movie->images as $image)
                <img src="{{ $image->path }}">
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection