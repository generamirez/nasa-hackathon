@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <th>IP</th>
            <th>Device</th>
            <th>Platform</th>
            <th>Version</th>
            <th>Platform Family</th>
            <th>User Agent</th>
            <th>Date</th>
            <th>Time</th>
        </thead>
        @forelse ($visitors as $v)
            <tr>
                <td>
                    {{$v->ip_address}}
                </td>
                <td>
                    {{$v->device_model}}
                </td>
                <td>
                    {{$v->platform}}
                </td>
                <td>
                    {{$v->platform_version}}
                </td>
                <td>
                    {{$v->platform_family}}
                </td>
                <td>
                    {{$v->user_agent}}
                </td>
                <td>
                    {{$v->date}}
                </td>
                <td>
                    {{$v->time}}
                </td>
            </tr>
        @empty

        @endforelse
    </table>
</div>
@endsection
