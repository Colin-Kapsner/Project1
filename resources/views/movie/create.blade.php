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

                <form action="{{ route('movies.store') }}" method="POST">
                    @csrf

                    <div class="inputField">
                        <div>
                            <label for="title">title:</label>
                            <input type="text" name="title" id="title" >
                        </div>
                        <div>
                            <label for="rating">rating:</label>
                            <input type="number" name="rating" id="rating" >
                        </div>
                        <div>
                            <label for="genre">genre:</label>
                            <select class="form-select" id="genre" name="genre">
                                <option value="action">action</option>
                                <option value="horror">horror</option>
                                <option value="drama">drama</option>
                                <option value="sci-fi">sci-fi</option>
                                <option value="comedy">comedy</option>
                                <option value="romance">romance</option>
                                <option value="fantasy">fantasy</option>
                                <option value="other">other</option>
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
