@props(['title', 'action', 'method', 'movie' => null, 'genres' => null])

<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <h2 class="modal-title">{{ $title }}</h2>
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
                        <label class="mt-3" for="genre">Genres:</label>
                        <!-- A Checkbox For Each Genre --> 
                        @foreach ($genres as $genre) 
                        <br>
                        <label for="{{ $genre->genre }}" class="col-md-2 col-form-label">{{ $genre->genre }}</label>
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}" @checked($movie ? $movie->genres->contains($genre->id) : false) />
                        @endforeach
                    </div>

                    <div>
                        <button type="button" id="add-img" class="btn btn-primary mt-3">{{ __('Add An Image') }}</button>
                        <div class="col-md-6" id="image_inputs">
                            <input id="movie_image" type="file" class="form-control mt-2" name="movie_images[]">
                        </div>
                    </div>
                </div class="mt-3">

                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>


    </div>
</div>


@push('scripts')
<script type="module">
    $(document).ready(function(){
        $('#add-img').on('click', function(e){
            let new_input = $('<input id="movie_image" type="file" class="form-control mt-2" name="movie_images[]">');
            $('#image_inputs').append(new_input);
        });
    });
</script>
@endpush