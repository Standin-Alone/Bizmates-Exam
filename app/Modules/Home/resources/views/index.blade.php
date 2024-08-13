@extends('global.base')

@section('title', 'Home')

@section("page-css")
    <style>
    .card-button{
        cursor:pointer;
    }

    .card-button:hover{
        box-shadow: rgba(23, 162, 184) 0px 19px 43px;
        transform: translate3d(0px, -10px, 0px);
        transition-duration: 0.5s;
    }
    </style>
@endsection



@section("page-js")
    <script>
        $(".card-button").on('click',function(){

            let place  = $(this).data('place');
            location.replace(`{{url('')}}/home/${place}`);
        
   
        });
    </script>
@endsection



@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="card-columns">
            <!-- begin card -->
            <div class="card card-button" data-place="tokyo">
                <img class="card-img-top" src="{{url('japan/Tokyo.jpg')}}" alt="" />
                <div class="card-block">
                    <h4 class="card-title m-t-0 m-b-10 text-primary">Tokyo </h4>
                    <p class="card-text semi-bold">Click here to  check recommended venues</p>
                    <a href="javascript:;" class="btn btn-sm btn-default">Check Venues</a>
                </div>
            </div>
            <!-- end card -->
            <!-- begin card -->
            <div class="card card-button" data-place="yokohama">
                <img class="card-img-top" src="{{url('japan/Yokohama.jpg')}}" alt="" />
                <div class="card-block">
                    <h4 class="card-title m-t-0 m-b-10 text-primary">Yokohama </h4>
                    <p class="card-text semi-bold">Click here to  check recommended venues</p>
                    <a href="javascript:;" class="btn btn-sm btn-default">Check Venues</a>
                </div>
            </div>
            <!-- end card -->
            <!-- begin card -->
            <div class="card card-button" data-place="kyoto">
                <img class="card-img-top" src="{{url('japan/Kyoto.jpg')}}" alt="" />
                <div class="card-block">
                    <h4 class="card-title m-t-0 m-b-10 text-primary">Kyoto </h4>
                    <p class="card-text semi-bold">Click here to  check recommended venues</p>
                    <a href="javascript:;" class="btn btn-sm btn-default">Check Venues</a>
                </div>
            </div>
            <!-- end card -->
            <!-- begin card -->
            <div class="card card-button" data-place="osaka">
                <img class="card-img-top" src="{{url('japan/Osaka.jpg')}}" alt="" />
                <div class="card-block">
                    <h4 class="card-title m-t-0 m-b-10 text-primary">Osaka </h4>
                    <p class="card-text semi-bold">Click here to  check recommended venues</p>
                    <a href="javascript:;" class="btn btn-sm btn-default">Check Venues</a>
                </div>
            </div>
            <!-- end card -->
            <!-- begin card -->
            <div class="card card-button" data-place="sapporo">
                <img class="card-img-top" src="{{url('japan/Sapporo.jpg')}}" alt="" />
                <div class="card-block">
                    <h4 class="card-title m-t-0 m-b-10 text-primary">Sapporo </h4>
                    <p class="card-text semi-bold">Click here to  check recommended venues</p>
                    <a href="javascript:;" class="btn btn-sm btn-default">Check Venues</a>
                </div>
            </div>
            <!-- end card -->
            <!-- begin card -->
            <div class="card card-button" data-place="nagoya">
                <img class="card-img-top" src="{{url('japan/Nagoya.jpg')}}" alt="" />
                <div class="card-block">
                    <h4 class="card-title m-t-0 m-b-10 text-primary">Nagoya </h4>
                    <p class="card-text semi-bold">Click here to  check recommended venues</p>
                    <a href="javascript:;" class="btn btn-sm btn-default">Check Venues</a>
                </div>
            </div>
            <!-- end card -->
     
        </div>

    </div>
</div>
@endsection