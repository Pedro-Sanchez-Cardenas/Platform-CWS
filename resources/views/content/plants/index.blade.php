@extends('layouts/contentLayoutMaster')

@section('title', 'Plants')

@section('vendor-style')

@endsection

@section('page-style')

@endsection

@section('content')
    <livewire:plants.card-plants :company="$company" :service="$service">
@endsection

@section('vendor-script')

@endsection

@section('page-script')

@endsection
