@extends('layouts.app')
<style>
        .messagebox{
            height:100vh;
        }

        .flex{
            flex-direction: column;
        }

        .user-chat:hover{
            z-index: 1;
            cursor: pointer;
        }

        .message-log{
            height:75vh;
        }
        .absolute {
            position: absolute;
            bottom: 10px;
            width: 100%;
        }

        .form-control {
            width: 100%;
        }

        .message-bubble {
            border-width: 5px;
            border-color:black;
            border-radius:25%;
        }

        .message-bubble p {
            padding:10px;
        }

        .flex-reverse {
            display:flex;
            flex-direction: row-reverse;
        }

        .flex-row {
            display:flex;
            flex-direction: row;
        }

        .scrollable {
            overflow-y: scroll;
            max-height: 60vh;
        }

        .main {
            overflow-x: hidden;
        }
    </style>
@section('content')



<div class="row justify-content-center">
    {{-- <div class="card-header">Messages</div> --}}
    <div class="col-sm-4 card messagebox--users">
       <div class="card-header">
           Users
       </div>
       <div class="container flex">
            <ul class="list-group mt-4 mb-4">
            @forelse ($allConvos as $a)
                @php
                    $data = json_decode($a->data);
                @endphp
                <a href="{{route('chat.show', $a->id)}}">
                <li class="list-group-item user-chat"> {{ $data->user_to }} - {{ $data->title }}</li>

                </a>
            @empty

            @endforelse
            </ul>
       </div>
    </div>
    <div class="card col-sm-8 col-xs-12 message-log">
        <div class="card-header">
             Message Log
        </div>

        @if(isset($convo))
        <div class="container">
            <div class="mt-4 mb-4 scrollable" id="messagesLog">
                <div class="container ">
                    <ul>
                    @forelse ($convo->messages as $m)
                    @php
                        $check = $m->sender->id == \Auth::user()->id ? "flex-reverse" : "flex-row";
                        // dd($m->sender, \Auth::user(), $check);
                    @endphp
                    <div class="row {{$check}}">

                        <li class="col-sm-3 list-group-item">
                                {{ $m->body }}
                        </li>
                    </div>

                    <br>
                    @empty

                    @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <div class="absolute">
            {{ Form::open(['route' => ['message.send',$convo->id]], ['class' => "col-sm-6"]) }}
            <div class="input-group mb-3">
                    <input type="text" name="message" class="form-control col-sm-10" aria-label="Message" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Send</button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>

        @else

        @endif
    </div>
</div>

<script>
    const element = document.getElementById('messagesLog');
    console.log(element)
    setInterval(()=>{
        element.scrollTop(100);
    }, 3000)

</script>
@endsection
