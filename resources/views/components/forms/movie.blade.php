@props(['title', 'action', 'method', 'movie' => null])

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
                        <label for="genre">Genre:</label>
                        <select class="form-select" id="genre" name="genre">
                            <option value="Action" @selected(old('modality', $movie)=='action' )>Action</option>
                            <option value="Horror" @selected(old('modality'), $movie==horror')>Horror</option>
                            <option value="Drama" @selected(old('modality'), $movie=='drama' )>Drama</option>
                            <option value="Sci-Fi" @selected(old('modality'), $movie=='sci-Fi' )>Sci-Fi</option>
                            <option value="Comedy" @selected(old('modality'), $movie=='comedy' )>Comedy</option>
                            <option value="Romance" @selected(old('modality'), $movie=='romance' )>Romance</option>
                            <option value="Fantasy" @selected(old('modality'), $movie=='fantasy' )>Fantasy</option>
                            <option value="Other" @selected(old('modality'), $movie=='other' )>Other</option>
                        </select>   
                    </div>
                    <div>
                        <label class="col-md-4 col-form-label text-md-end">{{ __('Add An Image') }}</label>
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