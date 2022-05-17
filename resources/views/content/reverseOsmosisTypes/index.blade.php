@extends('layouts/contentLayoutMaster')

@section('title', 'Reverse Osmosis Types')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2">Reverse Osmosis Types List</h2>
        </div>
        <div class="card-body">
            <livewire:reverse-osmosis-type.index-reverse-osmosis-type>
        </div>
    </div>
@endsection
