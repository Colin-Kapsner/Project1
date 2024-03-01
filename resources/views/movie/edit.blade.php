@extends('layouts.app')

@section('content')
    <x-forms.movie title="Edit Movie" action="{{ route('trips.update', ['movie'=>$movie->id]) }}" method="PATCH" :movie="$movie"/>
@endsection
