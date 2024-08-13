@extends('global.base')

@section('title', 'Home')

@section("page-css")
<style>
    .card-button {
        cursor: pointer;
        border-radius: 20px;
    }

    .card-button:hover {
        box-shadow: rgba(23, 162, 184) 0px 19px 43px;
        transform: translate3d(0px, -10px, 0px);
        transition-duration: 0.5s;
    }

    .card {
        margin-right: 20px !important;
    }
</style>
@endsection



@section("page-js")
<script>
    $(".card-button").on('click', function() {
        let venue_id = $(this).data('venue-id');
        window.open(`{{url('')}}/home/{{$place}}/${venue_id}`);
    });
</script>
@endsection



@section('content')
<div class="col-md-12 ">

    <div class="row">

        <div class="col-md-6">
            <div class="note note-warning">
                <div class="note-icon"><i class="fas fa-building -f"></i></div>
                <div class="note-content">
                    <h4><b>Welcome to {{ucfirst($place)}} Venues!</b></h4>
                    <p class="h4"> Here are some recommended venues. </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="note note-primary">
                <div class="note-icon">
                    <div id="icon block"><img id="wicon" src="http://openweathermap.org/img/w/{{$weather->weather[0]->icon}}.png" alt="Weather icon"></div>

                </div>
                <div class="note-content">
                    <h4><b>Weather Forecast Today! ({{$weather->weather[0]->main}})</b></h4>
                    <p class="h4"> Temperature  <span class="semi-bold">{{$weather->main->temp}} <span>&#8451;</span> </span></p>
                    <p class="h4"> {{$weather->weather[0]->description}}  </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card-columns">
            @foreach ( $nearby_venues as $value )
            <!-- begin card -->
            <div class="card card-button  mr-10" data-venue-id="{{$value->fsq_id}}">
                <img class="card-img-top bg-dark" src="{{$value->photo}}" alt="" />
                <div class="card-block">
                    <h4 class="card-title m-t-0 m-b-10 text-primary">{{$value->name}} </h4>
                    <p class="card-text semi-bold">Address: {{isset($value->location->address) ? $value->location->address : $value->location->formatted_address}}</p>
                    <p class="card-text semi-bold">Category: {{$value->categories[0]->name}}</p>
                    <a href="javascript:;" class="btn btn-sm btn-default">Check Venue</a>
                </div>
            </div>
            <!-- end card -->
            @endforeach

        </div>
    </div>
</div>
@endsection