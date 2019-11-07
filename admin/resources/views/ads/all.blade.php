@extends('layouts.admin.app')
@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
      <h1>
        Pending Ads
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Ads</li>
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
            <!-- <div class="box-header">
               <h3 class="box-title">Data Table With Full Features</h3> 
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="adsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr no</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
               @foreach($ads as $ad)
                
                    <!-- <li>".$ad->carregistrationnumber."<li>"; -->

                   <tr>
                        <td>{{$ad->id}}</td>
                        <td>{{str_limit($ad->adtitle, 10)}}</td>
                        <td>{{str_limit($ad->adverttext, 50)}}</td>
                        <td>{{$ad->price}}</td>
                        <td>
                        <a class="btn btn-info" href="{{ route('show',$ad->id) }}">Show</a>
                        <!-- <a class="btn btn-success" href="{{ route('approved',$ad->id) }}">Approved</a>
                         <a href="#" class="btn btn-danger">delete</a> -->
                        </td>
                </tr>
    
                
                @endforeach
                
               
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    
    <script>    
          jQuery("#success").delay(1000).fadeOut("slow");
    </script>


@endsection