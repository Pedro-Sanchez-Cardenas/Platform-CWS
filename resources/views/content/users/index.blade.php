@extends('layouts/contentLayoutMaster')

@section('title', 'Companies')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2">Company List</h2>
        </div>
        <div class="card-body">
            <livewire:users.users-table>
        </div>
    </div>
@endsection
