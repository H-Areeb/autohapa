@extends('layouts.admin.app')
@section('content')
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Car Features 
        <small>Car Features List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All sellers</li>
      </ol>
    </section>


            <div class="row">
                      <div class="col-xs-4"></div>
                <div class="col-xs-4">
                 
                        <div class="alert alert-success alert-dismissible" role="alert" id="success" style="display:none">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      
                        </div>
                  
                </div>
                        <div class="col-xs-4"></div>
            </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
            <div  class="col-md-4"></div>
              <div align="center" class="col-md-4">
                <form id="typeSearchForm" method="GET">
                    <select class="form-control selectpicker" id="select_type" name="select_type" data-live-search="true">
                        <option value="1">select</option>
                    
                    </select>
                </form>
              </div>
              <div align="right" class="col-md-4">
                <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Create Record</button>
              </div>
               
              
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="features-table" class="table table-bordered table-striped">
              
                <thead>
                <tr>
                  <th>Sr no</th>
                  <th>Name</th>
                  <th>ControlType</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                
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

    <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Record</h4>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-4" >Feature Name : </label>
                        <div class="col-md-8">
                        <input type="text" name="feature_name" id="feature_name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Select type : </label>
                        <div class="col-md-8">
                            <select class="form-control" id="select_type2" name="select_type2">
                            <option value=" ">select</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Select ControlType : </label>
                        <div class="col-md-8">
                            <select class="form-control" id="control_type" name="control_type">
                                <option value=" ">select</option>
                                <option value="1"><span class="label label-info">checkbox</span></option>
                                <option value="2"><span class="label label-warning">radio button</span></option>
                                <option value="3"><span class="label label-success">Select box</span></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" >* Ordinal : </label>
                        <div class="col-md-8">
                        <input type="number" name="ordinal" id="ordinal" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 control-label ">* status:</label>
                        <div class="col-sm-8">
                            <div class="switch-field">
                                <input type="radio" id="active" name="status" value="1" checked/>
                                <label for="active">Active</label>
                                <input type="radio" id="disabled" name="status" value="2" />
                                <label for="disabled">Disabled</label>
                            </div>
                        </div>
                     </div>
                   <div class="form-group" align="center">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Confirmation!</h2>
                </div>
                <span id="form_result"></span>
                <div class="modal-body">

                    <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                </div>
                <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>



    
    <script>    
          jQuery("#success").delay(1000).fadeOut("slow");
        
    //       $.ajaxSetup({
    //       headers: {
    //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //       }
    // });
          


        // ------------------- ONLOAD AJAX CALL FOR GETTING DATA INTO DATATABLES -----------------------------//

         $(document).ready(function(){

                    $.ajax({
                            url : '{{ route('VehicleFeatures.index') }}',
                            dataType: "json",
                            success:function(result)
                            {
                                
                                
                                    $.each(result.types, function(i, objs){
                                        
                                        var options = '<option value="'+objs.id+'">'+objs.name+'</option>';   
                                        
                                            $('#select_type').append(options);
                                            $('#select_type2').append(options);
                                    });
                                
                                    $('#features-table').DataTable({
                                        processing: true,
                                        serverSide: true,
                                        columns:[
                                                    { data: 'id', name: 'id' , orderable: false },
                                                    { data: 'Feature', name: 'Feature' },
                                                    { data: 'controlid', name: 'controlid' },
                                                    { data: 'type', name: 'type' },
                                                    { data: 'statusid', name: 'statusid' },
                                                    {data: 'action', name: 'action', orderable: false, searchable: false},
                                                ],
                                                
                                        });
                                },
                        });
         }); 
         
        // ------------------- ONLOAD AJAX CALL FOR GETTING DATA INTO DATATABLES //END -----------------------------//






    // ------------------- SELECT TYPE GETTING DATA working START -----------------------------//

                $('#select_type').on('change', function () {
                    var type_id = $(this).val();
                    //alert(type_id);
                    //  +'/'+type_id
                    
                    $('#features-table').DataTable().destroy();


                    $('#features-table').DataTable({
                            processing: true,
                            serverSide: true,
                    ajax:{
                            type: "GET",
                            url: "{{ route('VehicleFeatures.show')}}",
                            data: {type_id:type_id},
                            },
                    columns:[
                                { data: 'id', name: 'id' , orderable: false },
                                { data: 'Feature', name: 'Feature' },
                                { data: 'controlid', name: 'controlid' },
                                { data: 'type', name: 'type' },
                                { data: 'statusid', name: 'statusid' },
                                {data: 'action', name: 'action', orderable: false, searchable: false},
                            ],
                                                        
                    });
                    
                });                
    // ------------------- SELECT TYPE GETTING DATA working //END-----------------------------//         




         
                //----------- CALL MODAL ON BUTTON CLICK -------------// 
                        $('#create_record').click(function(){
                        $('.modal-title').text("Add New Record");
                            $('#action_button').val("Add");
                            $('#action').val("Add");
                           
                            $('#sample_form')[0].reset();
                            $('#formModal').modal('show');
                            $('#form_result').html('');
                            
                        });
                //----------- CALL MODAL ON BUTTON CLICK //END -------------// 








// ------------------- INSERT AND UPDATE working START -----------------------------//

    $('#sample_form').on('submit', function(event){
        event.preventDefault();
        
       //------------- INSERT FUNCTIONALITY START -----------// 
       
            if($('#action').val() == 'Add')
                {

                    $('#action_button').val("Loading...");

                $.ajax({
                    url:"{{ route('VehicleFeatures.store') }}",
                    method:"POST",
                    data: new FormData(this),
                    contentType: false,
                    cache:false,
                    processData: false,
                    dataType:"json",
                    success:function(data)
                    {
                        var msg = '';
                        if(data.errors)
                        {
                            msg = '<div class="alert alert-danger">';
                            for(var count = 0; count < data.errors.length; count++)
                            {
                                msg += '<p>' + data.errors[count] + '</p>';
                            }
                            msg += '</div>';
                        }

                        if(data.success)
                        {
                            msg = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                           
                        }
                        console.log('test');
                        $('#form_result').html(msg);
                        $('#action_button').val("Add");  
                        $('#features-table').DataTable().ajax.reload();
                    }
                });
            }

       //------------- INSERT FUNCTIONALITY //END ------------//  



       
       //------------ UPDATE FUNCTIONALITY START ----------//   
                
       
                if($('#action').val() == "Edit")
                    {var html = '';
                        
                        
                                $('#action_button').val("Loading...");

                        

                    $.ajax({
                        url:"{{ route('VehicleFeatures.update') }}",
                        method:"POST",
                        data:new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType:"json",
                        success:function(data)
                        {
                            
                            $('#form_result').css('display',' block');
                            if(data.errors)
                            {
                                    html = '<div class="alert alert-danger">';
                                for(var count = 0; count < data.errors.length; count++)
                                {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                    html += '</div>';
                            }

                            if(data.success)
                            {  
                                html = '<div class="alert alert-success" >' + data.success + '</div>';
                                $('#sample_form')[0].reset();
                                
                                
                            }
                            $('#action_button').val("Edit"); 
                                $('#form_result').html(html);
                                $('#features-table').DataTable().ajax.reload();
                        }
                    });
                }
            
            //--------------------- UPDATE FUNCTIONALITY END ----------------------//

    });
 

// ------------------- INSERT AND UPDATE working END -----------------------------//








        // ------------------- oN CLICK EDIT BUTTON GETTING DATA INTO MODAL  -----------------------------//

        $(document).on('click', '.edit', function(){
        var id = $(this).data('id');
        //alert(id);
        $('#form_result').html('');
            $.ajax({
                    type: "POST",
                    url : '{{ route('VehicleFeatures.edit') }}',
                    data: {id:id},
                    dataType:"json",
                    success:function(html){
                    
                        $('#feature_name').val(html.data.name);
                        $('#select_type2').val(html.data.type_id);
                        $('#control_type').val(html.data.controltypeid);
                        $('#ordinal').val(html.data.ordinal);
                        if(html.data.isactiveynid == 1){
                            $("#active").prop("checked", true);
                        }else{
                            $("#disabled").prop("checked", true);
                        }
                        $('#hidden_id').val(html.data.id);
                        $('.modal-title').text("Edit  Record");
                        $('#action_button').val("Edit");
                        $('#action').val("Edit");
                        $('#formModal').modal('show');
                    }
                    });
        });
    // ------------------- oN CLICK EDIT BUTTON GETTING DATA INTO MODAL END -----------------------------//






// ------------------- DELETE BUTTON  working START -----------------------------//




    var feature_id; 

 function featuredelete(thiselem)
 {
      feature_id = $(thiselem).data("id");
      $('.modal-title').text("Confirmation!");
        $('#confirmModal').modal('show');
 }

 $('#ok_button').click(function(){
        
            $.ajax({
            type: "POST",
            url : '{{ route('VehicleFeatures.destroy') }}',
            data: {feature_id:feature_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:"json",
            beforeSend:function(){
                $('#ok_button').text('Deleting...');
            },
            success:function(data)
            {


              if(data.errors)
                {
                    html = '<div class="alert alert-danger" >' + data.errors + '</div>';
                    $('#form_result').html(html);
                }

                if(data.success)
                {
                    setTimeout(function(){
                    $('#confirmModal').modal('hide');
                    $('#success').css('display', 'block');
                    $('#success').html(
                        'Featured Deleted <strong>SuccessFully</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                    );
                    $('#features-table').DataTable().ajax.reload();
                    $('#ok_button').text('Delete');
                    }, 2000);
                }
            },
        });

});






// ------------------- DELETE BUTTON  working END -----------------------------//

</script>

   

@endsection