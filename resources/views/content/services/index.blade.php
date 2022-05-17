@extends('layouts/contentLayoutMaster')

@section('title', 'Services')

@section('content')
    <!-- Kick start -->
    <div class="card">
        <div class="card-header">
            <h2 class="h2">Services List</h2>
        </div>
        <div class="card-body">
            <livewire:service.index-service :parameterCompany="$company">
        </div>
    </div>
    <!--/ Kick start -->
@endsection
