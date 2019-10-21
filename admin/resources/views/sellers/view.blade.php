@extends('layouts.admin.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        All sellers List
        <small>View All Sellers Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All sellers</li>
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
               @foreach($seller as $user)
                

                   <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        
                  @if($user->isActive_ynid == '1')
                        <td><span class="label label-success">Active</span></td>
                     @else 
                        <td><span class="label label-danger">In Active</span>'
                  @endif  
                        
                        <td>
                        <a class="btn btn-info" href="{{ route('SellersDetails', $user->id ) }}">Show Details</a>
                        <!-- <a class="btn btn-success" href="">Approved</a>
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