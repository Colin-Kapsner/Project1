@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-12">
            <h2>My Ratings <a href="{{ route('movies.create' }}" class="btn btn-primary float-end"> Add a Movie</a></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover mt-3 text-center table-bordered">
                <thead class="table-light">
                    
                    <tr>
                        <th>title</th>
                        <th>rating</th>
                        <th>genre</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id="data">
                @foreach($movies as $movie)
                <tr>
                    <td>{{ $movies->title }}</td>
                    <td>{{ $movies->rating }}</td>
                    <td>
                        <span class="badge badge-lg badge-dot">
                            <i class="bg-success">"</i>{{ $movies->genre }}
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                        <a href="{{ route('movies.edit', ['movie' => $movie->id] }}" class="btn btn-sm btn-square btn-neutral">
                            <i class="bi bi-pencil"></i>
</a>
                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>



<!--Read Data Modal-->
<div class="modal fade" id="readData">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Profile</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="#" id="myForm">

                    <div class="card imgholder">
                        <img src="./image/Profile Icon.webp" alt="" width="200" height="200" class="showImg">
                    </div>

                    <div class="inputField">
                        <div>
                            <label for="title">title:</label>
                            <input type="text" name="" id="title" required>
                        </div>
                        <div>
                            <label for="rating">rating:</label>
                            <input type="number" name="" id="rating" required>
                        </div>
                        <div>
                            <label for="genre">genre:</label>
                            <input type="text" name="" id="genre" required>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection