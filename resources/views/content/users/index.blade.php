@extends('layouts/contentLayoutMaster')
@section('vendor-style')
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    @endsection

@section('page-style')
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2">Users List</h2>
        </div>
        <div class="card-body">
            <livewire:users.users-table>
        </div>
    </div>
@endsection
@section('vendor-script')

    {{-- SweetAlert --}}
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>

    {{-- alpineJs Mask --}}
    <script src="{{ asset(mix('vendors/js/alpinejs/mask/mask.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Datepicker --}}
    {{-- SweetAlert --}}
        