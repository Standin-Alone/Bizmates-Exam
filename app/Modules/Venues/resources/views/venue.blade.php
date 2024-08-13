@extends('global.base')

@section('title', $venue->name)

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

    });
</script>
@endsection



@section('content')
<div class="col-sm-6 col-sm-offset-3 mx-auto">
    <div class="panel panel-primary ">

        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselIndicators" data-slide-to="1"></li>
                <li data-target="#carouselIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                @foreach ( $photos as $key => $value)
                <div class="carousel-item 
                              @if($key == 0)
                                active
                            @endif
                ">
                    <img class="d-block w-100 " src="{{$value->prefix}}800x500{{$value->suffix}}" >
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="panel-body">
            <h1>{{$venue->name}}</h1>
            
            <h4 class="text-secondary">
                Address: {{isset($venue->location->address) ? $venue->location->address : $venue->location->formatted_address}}
            </h4>
            <h4 class="text-secondary">
                Category: {{$venue->categories[0]->name}}
            </h4>
            
        </div>
    </div>


</div>
@endsection