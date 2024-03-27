@extends('layouts.app')

@section('content')
    <x-forms.movie title="Edit Movie" action="{{ route('movies.update', ['movie'=>$movie]) }}" method="PATCH" :movie="$movie" :genres="$genres"/>
@endsection
