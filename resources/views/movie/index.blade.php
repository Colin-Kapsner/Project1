@extends('layouts.app')

@section('content')
<div style="margin:auto; width: 70%;">
    <div class="row">
        <div class="col-12">
            <h2>My Ratings <a href="{{ route('movies.create') }}" class="btn btn-primary float-end"> Add a Movie</a></h2>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover mt-3 text-center table-bordered">
                <thead class="table-light">
                    
                    <tr>
                        <th>Title</th>
                        <th>Rating</th>
                        <th>Genres</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id="data">
                @foreach($movies as $movie)
                <tr id="{{ $movie->id }}">
                    <td><a href="{{ route('movies.show', ['movie' => $movie->id]) }}">{{ $movie->title }}</a></td>
                    <td>{{ $movie->rating }}</td>
                    <td>
                    <ul>
                        @foreach($movie->genres as $genre)
                            <li>
                                {{ $genre->genre }}
                            </li>
                        @endforeach
                    </ul>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('movies.edit', ['movie' => $movie->id]) }}" class="btn btn-sm btn-square btn-neutral">
                            <i class="bi bi-pencil">Edit</i>
                        </a>
                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover delete-btn">
                            <i class="bi bi-trash">Delete</i>
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script type="module">
    $(document).ready(function(){
        $('.delete-btn').on('click', function(e){
            let row = $(this).closest('tr');
            let id = row.attr('id');
            if(confirm("You sure?")){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/movies/' + id,
                    type: 'DELETE',
                    success: function(result){
                        $(row).remove();
                    }
                });
            }
        });
    });
</script>
@endpush