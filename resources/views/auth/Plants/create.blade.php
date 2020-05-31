@extends('layouts.app')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
    </div>
@endif
    {{ Form::open(['route' => 'plants.store', 'files'=>'true', "class"=> 'row']) }}
        @include('auth.Plants.fields')
    {{ Form::close() }}
@endsection
