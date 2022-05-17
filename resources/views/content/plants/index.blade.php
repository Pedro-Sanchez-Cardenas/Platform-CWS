@extends('layouts/contentLayoutMaster')

@section('title', 'Plants')

@section('content')
    <livewire:plants.card-plants :parameterCompany="$company">
@endsection
