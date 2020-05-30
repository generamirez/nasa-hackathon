@extends('layouts.app')

@section('content')

@if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
    </div>
@endif
    @include('FarmerDashboard.SalesPost.table')
@endsection
