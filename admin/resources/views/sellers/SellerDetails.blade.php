@extends('layouts.admin.app')
@section('content')

<link rel="stylesheet" href="{{ asset('admin_assets/dist/css/searchCarStyleCode.css')}}" />



<section class="content-header">
    <h1>
        Seller Details
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ route('Sellers')}}">Sellers List</a></li>
    </ol>
</section>

<div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
        @if(Session::has('success'))

        <div class="alert alert-success alert-dismissible" role="alert" id="success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('success') }}
        </div>
        @endif
    </div>
    <div class="col-xs-4"></div>
</div>




<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

            <div class="box-header">
                        <h1 class="box-title">{{$sellerads[0]->sellerName }}</h1> 
                 </div> 
            <!-- /.box-header -->


                <div class="box-body">
                    
                    <ul id="searchCarsList" class="col-lg-8">

                        @foreach($sellerads as $sellerad)

                        <li class="search-page__result">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4"><a href="{{ route('show',$sellerad->id) }}"><img src="{{ env('APP_URL')}}assets/{{$sellerad->image}}" alt="" class="img-responsive"></a></div>
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-9" style="border-right:1px solid #ccc">
                                                    <h4 class="title text-left"><a href="{{ route('show',$sellerad->id) }}">{{$sellerad->title}}</a></h4>
                                                    <!-- <p class="blockquote mt-2 tagss">{{$sellerad->milage}} miles | {{$sellerad->color}} | {{substr($sellerad->derivative, 0, 3)}} L | {{$sellerad->Transmission}} | {{$sellerad->FuelType}} </p>
                                                    <p style="font-size:12px;">{{substr($sellerad->Detail, 0, 50)}}.</p>-->
                                                    <br>
                                                    @if($sellerad->Approved_id == '1')
                                                        <span class="label label-success" style="font-size:18px;">Approved</span> 
                                                    @else
                                                        <span class="label label-danger" style="font-size:18px;">Not Approved</span> 
                                                    @endif
                                                </div>
                                                <div class="col-lg-3"><span class="badge price-badge w-100" style="font-size:18px;">${{$sellerad->price}}</span></div>
                                            </div>
                                        </div>
                                        <!-- <div id="image_preview" class="row mt-2 ml-5">
                                        @foreach($adimg as $img)
                                            <img id="" src="http://localhost/autohapa/assets/{{$img->name}}" class="img-responsive">
                                        @endforeach

                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <ul class="car_div_ul">
                                <li><a href="#">Get an insurance quote </a></li>
                                <li><a href="#"> Check its history</a></li>
                            </ul> -->
                        </li>
                    @endforeach
                    <br>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection