@extends('layouts.app')

@section('content')
    <x-forms.movie title="New Movie" action="{{ route('trips.store') }}" method="POST"/>
@endsection