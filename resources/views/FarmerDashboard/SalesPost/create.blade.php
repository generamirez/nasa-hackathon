@extends('layouts.app')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
    </div>
@endif
    {{ Form::open(['route' => 'sales-posts.store', 'files'=>'true', "class"=> 'row']) }}
        @include('FarmerDashboard.SalesPost.fields')
    {{ Form::close() }}
@endsection
