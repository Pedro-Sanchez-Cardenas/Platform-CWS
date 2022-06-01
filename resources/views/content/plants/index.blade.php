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
    {{-- Moment.js --}}
    <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>

    <script>
        function getDiffDate($created_at){
            let data = $created_at.split(' ')
            let date = data[0].split('-')
            let hours = moment(data[])
            let y = new moment()
            let diffDay = moment.duration(y.diff(hours)).humanize()
            console.log(diffDay)
        }
    </script>
@endsection

@section('page-script')

@endsection
