@extends('layouts.app')

@section('content')
<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title">Rate A New Movie</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

            <form action="{{ route('movies.store') }}" id="create" method="POST">
                @csrf

                <div class="inputField">
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" >
                    </div>
                    <div>
                        <label for="rating">Rating 1-10:</label>
                        <input type="number" min="1" max="10" name="rating" id="rating" >
                    </div>
                    <div>
                        <label for="genre">Genre:</label>
                        <select class="form-select" id="genre" name="genre">
                            <option value="Action">Action</option>
                            <option value="Horror">Horror</option>
                            <option value="Drama">Drama</option>
                            <option value="Sci-Fi">Sci-Fi</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Romance">Romance</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Other">Other</option>
                    </div>
                </div>

                <button type="submit" form="create" class="btn btn-primary submit">Create</button>

            </form>
        </div>

    </div>
</div>
@endsection
