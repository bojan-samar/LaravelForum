@extends('admin.layout.app')
@push('meta')
    <script src="{{ asset('js/chart.min.js') }}"></script>
@endpush

@section('content')
    @livewire('admin.dashboard.index')
@endsection


