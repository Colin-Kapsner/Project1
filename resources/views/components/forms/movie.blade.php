@props(['title', 'action', 'method', 'movie' => null, 'genres' => null])

<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <h2 class="modal-title">Rate/Edit a Movie</h2>
        <div class="modal-body">
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($method)
                <div class="inputField">
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $movie  ?? '' )}}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="rating">Rating:</label>
                        <input type="text" class="form-control @error('rating') is-invalid @enderror" name="rating" id="rating" value="{{ old('rating', $movie ?? '' )}}">
                        @error('rating')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mt-3" for="genre">Genre:</label>
                        <!-- A Checkbox For Each Genre --> 
                        @foreach ($genres as $genre) 
                        <br>
                        <label for="{{ $genre->genre }}" class="col-md-2 col-form-label">{{ $genre->genre }}</label>
                        <input type="checkbox" name="genre[]" value="{{ $genre->genre }}" @checked(old($movie->genre == $genre->genre )) />
                        @endforeach
                        
                    </div>
                    <div>
                        <label class="col-md-4 col-form-label text-md-end mt-4">{{ __('Add An Image') }}</label>
                        <div class="col-md-6">
                            <input id="movie_image" type="file" class="form-control" name="movie_image">
                        </div>



                    </div>

                </div class="mt-3">

                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>


    </div>
</div>