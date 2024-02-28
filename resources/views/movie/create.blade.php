@extends('layouts.app')

@section('content')
<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title">Rate A New Movie</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

            <form action="{{ route('movies.store') }}" method="POST">
                @csrf

                <div class="inputField">
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="rating">Rating:</label>
                        <input type="number" class="form-control @error('title') is-invalid @enderror" name="rating" id="rating" value="{{ old('rating') }}">
                        @error('rating')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="genre">genre:</label>
                        <select class="form-select" id="genre" name="genre">
                            <option value="Action" @selected(old('modality') == 'action')>Action</option>
                            <option value="Horror" @selected(old('modality') == 'Horror')>Horror</option>
                            <option value="Drama" @selected(old('modality') == 'Drama')>Drama</option>
                            <option value="Sci-Fi" @selected(old('modality') == 'Sci-Fi')>Sci-Fi</option>
                            <option value="Comedy" @selected(old('modality') == 'Comedy')>Comedy</option>
                            <option value="Romance" @selected(old('modality') == 'Romance')>Romance</option>
                            <option value="Fantasy" @selected(old('modality') == 'Fantasy')>Fantasy</option>
                            <option value="Other" @selected(old('modality') == 'Other')>Other</option>
                    </div>
                </div>

            </form>
        </div>

        <div>
            <button type="button" class="btn btn-secondary" >Close</button>
            <button type="submit" form="myForm" class="btn btn-primary submit">Submit</button>
        </div>
    </div>
</div>
@endsection