@extends('layouts.app')

@section('content')
<div class="modal fade" id="userForm">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Rate A New Movie</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('movies.update', ['movie' => $movie->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="inputField">
                        <div>
                            <label for="title">title:</label>
                            <input type="text" name="title" id="title" value="{{ $movie->title }}">
                        </div>
                        <div>
                            <label for="rating">rating:</label>
                            <input type="number" name="rating" id="rating" value="{{ $movie->rating }}">
                        </div>
                        <div>
                            <label for="genre">genre:</label>
                            <select class="form-select" id="genre" name="genre" >
                                <option value="action" @selected($movie->genre == 'action')>action</option>
                                <option value="horror" @selected($movie->genre == 'horror')>horror</option>
                                <option value="drama" @selected($movie->genre == 'drama')>action>drama</option>
                                <option value="sci-fi" @selected($movie->genre == 'sci-fi')>action>sci-fi</option>
                                <option value="comedy" @selected($movie->genre == 'comedy')>action>comedy</option>
                                <option value="romance" @selected($movie->genre == 'romance')>action>romance</option>
                                <option value="fantasy" @selected($movie->genre == 'fantasy')>action>fantasy</option>
                                <option value="other" @selected($movie->genre == 'other')>action>other</option>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="myForm" class="btn btn-primary submit">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection
