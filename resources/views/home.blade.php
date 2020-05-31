@extends('layouts.app')

@section('content')
<div class="container">
        {{ dd(\Auth::user()) }}
    @if (\Auth::user()->role == "supplier")
    <div class="container">
            <div class="col-sm-12">
                    <h4>Suggested Crops</h4>
            </div>
            <div class="row">
                    @forelse ($plants as $p)
                        <div class="col-sm-3 " style="margin:0;">
                          <img class="card-img-top" src="{{ $p->thumbnailUrl }}" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title">{{ $p->name }}</h5>
                            <a href="{{ route('home',['plant' => $p->id]) }}" class="btn btn-primary">Choose This</a>
                          </div>
                        </div>
                    @empty

                    @endforelse

            </div>
    </div>
    @if (isset($plant))
    <hr>
        <div class="container">
            <div class="col-sm-12">
                <h4>{{ $plant->name }}</h4>
                <i> {{ $plant->scientific_name }} </i>
                <p>Optimum Growth Temperature: {{ $plant->opt_grow_temp }} </p>
                <p>Minimum Growth Temperature: {{ $plant->min_grow_temp }} </p>
            </div>
        </div>
    <hr>
    @endif
    <div class="row justify-content-center">
        <div class="row">
                <h4>Historical Data</h4>
                <br>
                <small class="text-muted">Over La Union, Philippines  </small>
        </div>
        <div class="col-sm-12">
            <div class="table-responsive">
                    <table class="table">
                            <thead>
                                <th>Month</th>
                                <th>Precipitation(in mm)</th>
                                <th>Temperature(in K)</th>
                                {{-- @if (isset($plant))
                                    <th>
                                        Month Tips
                                    </th>
                                @endif --}}
                            </thead>
                            @php
                                // $plantTips = isset($plant) ? json_decode($plant->tips) : "";
                            @endphp
                            <tbody>
                                @forelse ($hd as $i)
                                <tr>
                                    {{-- {{ dd($i) }} --}}
                                    <td> {{ $i['date'] }} </td>
                                    <td> {{ $i['precipitation'] }} </td>
                                    <td> {{ $i['temperature'] }} </td>
                                    {{-- @if (isset($plant))
                                    <td>
                                        <ul>
                                            <li>
                                                {{ isset($plantTips[$loop->index]) ? "Water needed per day (mm): ".$plantTips[$loop->index] : "None" }}
                                            </li>
                                            @php
                                                if( $i['temperature'] < $plant->min_grow_temp  )
                                                    $tempTip = "Plant wont grow in this temperature";
                                                elseif ($i['temperature'] <= $plant->opt_grow_temp && $i['temperature'] >= $plant->min_opt_grow_temp) {
                                                    $tempTip = "Plant is in an optimal temperature, it will grow best with the right nutrition and management";
                                                } else{
                                                    $tempTip = "Plant won't be able to grow optimally, adjust management practices.";
                                                }
                                                // dd($i['temperature'] <= $plant->opt_grow_temp && $i['temperature'] >= $plant->min_opt_grow_temp);
                                            @endphp
                                            <li>
                                                {{ $tempTip }}
                                            </li>
                                        </ul>
                                    </td>
                                    @endif --}}
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="row">
                    <h4>Projected Data</h4>
                    <br>
                    <small class="text-muted">Over La Union, Philippines  </small>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                        <table class="table">
                                <thead>
                                    <th>Month</th>
                                    <th>Precipitation(in mm)</th>
                                    <th>Temperature(in K)</th>
                                    @if (isset($plant))
                                        <th>
                                            Month Tips
                                        </th>
                                    @endif
                                </thead>
                                @php
                                    $plantTips = isset($plant) ? json_decode($plant->tips) : "";
                                @endphp
                                <tbody>
                                    @forelse ($fc as $i)
                                    <tr>
                                        {{-- {{ dd($i) }} --}}
                                        <td> {{ $i['date'] }} </td>
                                        <td> {{ $i['precipitation'] }} </td>
                                        <td> {{ $i['temperature'] }} </td>
                                        @if (isset($plant))
                                        <td>
                                            <ul>
                                                <li>
                                                    {{ isset($plantTips[$loop->index]) ? "Water needed per day (mm): ".$plantTips[$loop->index] : "None" }}
                                                </li>
                                                @php
                                                    if( $i['temperature'] < $plant->min_grow_temp  )
                                                        $tempTip = "Plant wont grow in this temperature";
                                                    elseif ($i['temperature'] <= $plant->opt_grow_temp && $i['temperature'] >= $plant->min_opt_grow_temp) {
                                                        $tempTip = "Plant is in an optimal temperature, it will grow best with the right nutrition and management";
                                                    } else{
                                                        $tempTip = "Plant won't be able to grow optimally, adjust management practices.";
                                                    }
                                                    // dd($i['temperature'] <= $plant->opt_grow_temp && $i['temperature'] >= $plant->min_opt_grow_temp);
                                                @endphp
                                                <li>
                                                    {{ $tempTip }}
                                                </li>
                                            </ul>
                                        </td>
                                        @endif
                                    </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
