<?php
include_once("../includes/config.php");
include_once("../includes/Auth.php");
include_once("../includes/checkSession.php");
include_once('../includes/header.php');
?>
<hr>
<link rel="stylesheet" href="../searchCar/searchCarStyleCode.css">
<link rel="stylesheet" href="customers.css">

<style>
    .status {

        float: right;
    }

    ul#searchCarsList {
        padding-left: 0;
    }

    .side-nav {
        margin-top: 62px;
    }

    .side-nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        border: 1px solid rgba(0, 0, 0, .125);
        border-bottom: 0;
    }

    .side-nav ul li {
        border-bottom: 1px solid rgba(0, 0, 0, .125);
        
    }

    .side-nav ul li a {
        color: #000;
        display: inline-block;
        padding: 0.75rem;
    }
    .side-nav ul li span {
       
        position: relative;
    }

    .overlay{
            
            display: block;
            opacity: 0.5;
            z-index: 1000001; 
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            }
    img.loading
            {
                box-shadow: 0px 0px 5px #fff;
                margin-left:200px;
                vertical-align: center;
                margin-top:0;
                height: 200px;
                width: 200px;

            }
</style>

<section class="main mt-5 mb-5">
    <div class="container">
        <!-- Errors div -->
        <div style="max-width:400px;margin: 0 auto;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="Errors" style="display:none;"></div>
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMsg" style="display:none;"></div>
        </div>
        <div class="row justify-content-center">

            <aside class="col-md-3">
                <nav class="side-nav">
                    <ul>
                        <li><a href="JavaScript:void(0);" class="btn-link" onclick="filter(1,2)">Active</a>
                             <span class="badge badge-success" id="count_active"></span>
                        </li>
                        <li><a href="JavaScript:void(0);" class="btn-link" onclick="filter(2,1)">Rejected</a>
                             <span class="badge badge-danger" id="count_rejected"></span>
                        </li>
                        <li><a href="JavaScript:void(0);" class="btn-link" onclick="filter(2,2)">On waiting</a>
                            <span class="badge badge-warning" id="count_waiting"></span>
                        </li>
                    </ul>
                </nav>
            </aside>

            <div class="col-md-9">
                <h2 class="mt-3">My ADS</h2>
                <input type="hidden" id="idcustomer" value="<?= $customer_id; ?>">
                <div id="nav-tabContent">
                    <div class="overlay" ></div>
                    <ul id="searchCarsList" class="">
                       
                    </ul>
                </div>

            </div>

        </div>
    </div>
</section>


<script>
    $(document).ready(function() {

        get_status();

        var idcustomer = "idcustomer=" + $('#idcustomer').val();



        $.ajax({
            type: "POST",
            url: "ajax_ads_getById.php",
            data: idcustomer,
            dataType: "JSON",
            success: function(result) {


                $.each(result, function(i, obj) {
                    var div_data = '<li class="search-page__result"><div  class="card">';
                    div_data += '<div class="card-body">';

                    div_data +=
                        '<div class="row"><div class="col-lg-4"><a href="../ad-details/?ad-id=' +
                        obj.id + '&title=' + obj.title + '&price=' + obj.price + '" ><img src="../assets/' + obj.image +
                        '" alt="" class="img-fluid" /></a></div>';

                    div_data +=
                        '<div class="col-lg-8"><div class="row"><div class="col-lg-9" style="border-right:1px solid #ccc">';

                    if (obj.approved == 1) {
                        div_data +=
                            '<div class="badge status badge-success">Approved</div>';
                    } else if (obj.rejected == 1) {
                        div_data +=
                            '<div class="badge status badge-danger">Rejected</div>';
                    } else {
                        div_data +=
                            '<div class="badge status badge-warning">On Waiting</div>';
                    }

                    div_data += ' <h4 class="title text-left"><a href="../ad-details/?ad-id=' + obj.id + '&title=' + obj.title + '&price=' + obj.price + '" >' + obj.title.substr(0, 20) + '...</a></h4>';
                    div_data += ' <p class="blockquote mt-2 tagss" >' +
                                    obj.milage + ' miles | ' + obj.color + ' | ' +
                                    obj.variant + ' |' + obj.Transmission + ' | ' +
                                    obj.FuelType + '</p>';
                    div_data += ' <p style="font-size:12px;">' + obj.Detail +'</p><p style="font-size:12px;">Four wheel-drive, Grey...</p></div>';


                    div_data +=' <div class="col-lg-3"><span class="badge price-badge w-100" style="font-size:18px;">$'+obj.price+'</span></div>';
                    div_data += '</div></div>';

                    div_data +='<div id="image_preview" class="row mt-2 ml-1">';
                    
                        $.each(obj.Images, function(i, obj1) {
                                div_data += '<img id="' + obj1.id +'" src="../assets/' + obj1.name + '"/>';
                                //$('#image_preview').append(img);
                            });
                    div_data += '</div>';
                    div_data +=' </div> </div></div></li>';

                    $('#searchCarsList').append(div_data);

                });
            },
        });


    });


function get_status()
{
    var datastring = "count_user_id=" + $('#idcustomer').val();

    

$.ajax({
    type: "GET",
    url: "ajax_ads_getById.php",
    data: datastring,
    dataType: "JSON",
    success: function(result) {
       
        //alert(result.data[0].active);
       
        $.each(result.data,function(i,obj){

            $('#count_active').html(obj.active);
            $('#count_rejected').html(obj.rejected);
            $('#count_waiting').html(obj.waiting);

        });
        
       // $('.overlay').css("display","none");
    },
    });

}



function filter(approved_id,rejected_id)
{
    var datastring = "customer_id=" + $('#idcustomer').val()+
                    "&approved_id="+approved_id+
                    "&rejected_id="+rejected_id;

                   // $('.overlay').html('<img class="loading" src="../assets/images/loadingsome.gif">');     

$.ajax({
    type: "POST",
    url: "ajax_ads_getById.php",
    data: datastring,
    dataType: "JSON",
    success: function(result) {



        $('#searchCarsList').html('');
       
        //setTimeout(function() {
            
                    $.each(result, function(i, obj) {
                                
                                var div_data = '<li class="search-page__result"><div  class="card">';
                                div_data += '<div class="card-body">';

                                div_data +=
                                    '<div class="row"><div class="col-lg-4"><a href="../ad-details/?ad-id=' +
                                    obj.id + '&title=' + obj.title + '&price=' + obj.price + '" ><img src="../assets/' + obj.image +
                                    '" alt="" class="img-fluid" /></a></div>';

                                div_data +=
                                    '<div class="col-lg-8"><div class="row"><div class="col-lg-9" style="border-right:1px solid #ccc">';

                                if (obj.approved == 1) {
                                    div_data +=
                                        '<div class="badge status badge-success">Approved</div>';
                                } else if (obj.rejected == 1) {
                                    div_data +=
                                        '<div class="badge status badge-danger">Rejected</div>';
                                } else {
                                    div_data +=
                                        '<div class="badge status badge-warning">On Waiting</div>';
                                }

                                div_data += ' <h4 class="title text-left"><a href="../ad-details/?ad-id=' + obj.id + '&title=' + obj.title + '&price=' + obj.price + '" >' + obj.title.substr(0, 20) + '...</a></h4>';
                                div_data += ' <p class="blockquote mt-2 tagss" >' +
                                                obj.milage + ' miles | ' + obj.color + ' | ' +
                                                obj.variant + ' |' + obj.Transmission + ' | ' +
                                                obj.FuelType + '</p>';
                                div_data += ' <p style="font-size:12px;">' + obj.Detail +'</p><p style="font-size:12px;">Four wheel-drive, Grey...</p></div>';


                                div_data +=' <div class="col-lg-3"><span class="badge price-badge w-100" style="font-size:18px;">$'+obj.price+'</span></div>';
                                div_data += '</div></div>';

                                div_data +='<div id="image_preview" class="row mt-2 ml-1">';
                                
                                    $.each(obj.Images, function(i, obj1) {
                                            div_data += '<img id="' + obj1.id +'" src="../assets/' + obj1.name + '"/>';
                                            //$('#image_preview').append(img);
                                        });
                                div_data += '</div>';
                                div_data +=' </div> </div></div></li>';

                                $('#searchCarsList').append(div_data);
                                
                            });
                        
                            
    
                //}, 1000);
                //$('.overlay').html(''); 
      },
});

}


</script>






<?php include_once('../includes/footer.php'); ?>