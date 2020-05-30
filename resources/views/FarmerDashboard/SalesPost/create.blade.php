@extends('layouts.app')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
    </div>
@endif
    {{ Form::open(['route' => 'sales-posts.store', 'files'=>'true']) }}
        @include('FarmerDashboard.SalesPost.fields')
        <button type="submit" class="btn btn-primary"> Submit </button>
    {{ Form::close() }}
@endsection
