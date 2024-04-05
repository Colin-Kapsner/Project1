@extends('layouts.app')

@section('content')
    <x-forms.movie title="Add Movie" action="{{ route('movies.store') }}" method="POST" :genres="$genres"/>
@endsection