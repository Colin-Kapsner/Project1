@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-12">
            <h2>My Ratings <a href="{{ route('movies.create') }}" class="btn btn-primary float-end"> Add a Movie</a></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover mt-3 text-center table-bordered">
                <thead class="table-light">
                    
                    <tr>
                        <th>Title</th>
                        <th>Rating</th>
                        <th>Genre</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id="data">
                @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->rating }}</td>
                    <td>{{ $movie->genre }}</td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                        <a href="{{ route('movies.edit', ['movie' => $movie->id]) }}" class="btn btn-sm btn-square btn-neutral">
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



@endsection