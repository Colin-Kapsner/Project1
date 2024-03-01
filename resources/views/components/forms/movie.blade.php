@props(['title', 'action', 'method', 'trip' => null])

<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
            <h2 class="modal-title">Rate A New Movie</h2>
        <div class="modal-body">
            <form action="{{ route('movies.store') }}" method="POST">
                @csrf
                @method($method)
                <div class="inputField">
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $movie : '') }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="rating">Rating:</label>
                        <input type="number" class="form-control @error('title') is-invalid @enderror" name="rating" id="rating" value="{{ old('rating', $movie) ?? '' }}">
                        @error('rating')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="genre">genre:</label>
                        <select class="form-select" id="genre" name="genre">
                            <option value="Action" @selected(old('modality', $movie) == 'action')>Action</option>
                            <option value="Horror" @selected(old('modality'), $movie == 'Horror')>Horror</option>
                            <option value="Drama" @selected(old('modality'), $movie == 'Drama')>Drama</option>
                            <option value="Sci-Fi" @selected(old('modality'), $movie == 'Sci-Fi')>Sci-Fi</option>
                            <option value="Comedy" @selected(old('modality'), $movie == 'Comedy')>Comedy</option>
                            <option value="Romance" @selected(old('modality'), $movie == 'Romance')>Romance</option>
                            <option value="Fantasy" @selected(old('modality'), $movie == 'Fantasy')>Fantasy</option>
                            <option value="Other" @selected(old('modality'), $movie == 'Other')>Other</option>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-secondary" >Close</button>
                    <button type="submit" form="myForm" class="btn btn-primary submit">Submit</button>
                </div>
            </form>
        </div>

        
    </div>
</div>