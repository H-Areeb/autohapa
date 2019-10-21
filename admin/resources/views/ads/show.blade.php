@extends('layouts.admin.app')
@section('content')

<link rel="stylesheet" href="{{ asset('admin_assets/dist/css/showAd-detailsStyleCode.css')}}" />



<section class="content-header">
      <h1>
      Ad Details
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ route('approvedAds')}}">Approved Ads</a></li>
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
             @if(Session::has('error'))
             
             <div class="alert alert-danger alert-dismissible" role="alert" id="success">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           {{ Session::get('error') }}
              </div>
             @endif
          </div>
              <div class="col-xs-4"></div>
      </div>

                @if(isset($ads[0]->title))


 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
             <div class="box">
             <div class="box-body">
            
                    <div class="row section-gap mx-xs-0 mb-5">
                        
                        <header class="fpa__heading col-md-12">
                            <div class="advert-heading fpa__title">
                                    <div class="advert-heading__condition ">Used car</div>
                                        <h1 class="advert-heading__title ">{{$ads[0]->title}}</h1>
                                        <p class="advert-heading__attention-grabber ">{{$ads[0]->subtitle}}</p>
                            </div>
                            <div class="advert-price fpa__price">
                                    <div class="advert-price__cash">
                                        <span class="advert-price__cash-price mt-3">${{$ads[0]->price}}</span>
                                    </div>
                                    
                            </div>
                        </header>
                        <hr>
                        <div class="col-md-7">
<!-- 
                            <div class="row" data-lightbox="photos">
                            
                                <a href="http://localhost/autohapa/assets/{{$ads[0]->image}}" data-lightbox="photos" class="w-100 main-img">
                                    <img src="http://localhost/autohapa/assets/{{$ads[0]->image}}" alt="" srcset="" class="w-100 main-img" />
                                </a> 
                            </div> -->





<div class="slideshow-container">

<!-- 
        <div class="mySlides fade" " data-lightbox="photos">
        <a href="http://localhost/autohapa/assets/{{$ads[0]->image}}" data-lightbox="photos" class="w-100 main-img">
            <img src="http://localhost/autohapa/assets/{{$ads[0]->image}}" class="w-100 main-img" >
        </a>
        </div> -->

            @foreach($adimg as $img)
            <div class="mySlides">
                <a href="{{ env('APP_URL')}}assets/{{$img->name}}"  data-lightbox="photos" class="main-img">
                    <img  src="{{ env('APP_URL')}}assets/{{$img->name}}" class="main-img img-responsive">
                </a>
                @php
                      $img_id = $img->id;
                      $carad_id = $ads[0]->id;

                @endphp
                <div class="middle">
                    <a  href="{{ route('imgApprove',  ['img_id' =>$img_id ,'carad_id' =>$carad_id]) }}"  class="btn btn-success" id="approvedImg">Approve</a>
                    <a  href="{{ route('imgReject', ['img_id' =>$img_id ,'carad_id' =>$carad_id])}}"  class="btn btn-danger" id="deleteImg">Reject</a>
                 </div>
                 
                 
                        @if($img->isadminApproved_ynid == '1')
                            <span class="tag tag-approved">Approved</span>
                        @elseif($img->isdeleted_ynid == '1')
                            <span class="tag tag-rejected">Rejected</span>
                        @else
                            <span class="tag tag-unapproved">Unapproved</span>
                        @endif


            </div>                               
                @endforeach

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
                            
                            <div id="image_preview" class="row mt-2 ml-1 mb-2">
                              
                                
                                    <div id="image_preview">
                                    @foreach($adimg as $img)
                                    <a href="{{ env('APP_URL')}}assets/{{$img->name}}"  data-lightbox="photos">
                                        <img class="img-responsive" src="{{ env('APP_URL')}}assets/{{$img->name}}">
                                    </a>
                                    @endforeach
                                    </div>
                             
                                
                            </div>
                            
                        <div class="row">
                                <div class="heading mt-2">
                                    <h3 class="advert-price__cash-price">Overview</h3>
                                </div>
                            <div class="fpa__overview mt-3">
                                <div class="fpa__key-specs">
                                    <ul class="key-specifications">
                                        <li>
                                            <svg class="key-specifications__icon">
                                            <use xlink:href="/images/svg/key-specifications/cars.svg#ks-manufactured-year"></use>
                                            </svg>{{str_limit($ads[0]->variant,6)}} 
                                        </li>
                                        <li>
                                            <svg class="key-specifications__icon">
                                            <use xlink:href="/images/svg/key-specifications/cars.svg#ks-body-type"></use>
                                            </svg>{{$ads[0]->color}} 
                                        </li>
                                        <li>
                                            <svg class="key-specifications__icon">
                                            <use xlink:href="/images/svg/key-specifications/cars.svg#ks-mileage"></use>
                                            </svg>{{$ads[0]->milage}}  miles
                                        </li>
                                        <li>
                                            <svg class="key-specifications__icon">
                                            <use xlink:href="/images/svg/key-specifications/cars.svg#ks-engine-size"></use>
                                            </svg>{{substr($ads[0]->derivative, 0, 3)}} L
                                        </li>
                                        <li>
                                            <svg class="key-specifications__icon">
                                            <use xlink:href="/images/svg/key-specifications/cars.svg#ks-transmission"></use>
                                            </svg>{{$ads[0]->Transmission}}
                                        </li>
                                        <li>
                                            <svg class="key-specifications__icon">
                                            <use xlink:href="/images/svg/key-specifications/cars.svg#ks-fuel-type"></use>
                                            </svg>{{$ads[0]->FuelType}}
                                        </li>
                                        <li>
                                            <svg class="key-specifications__icon">
                                            <use xlink:href="/images/svg/key-specifications/cars.svg#ks-doors"></use>
                                            </svg>4 doors
                                        </li>
                                    </ul>
                                </div>
                                <br>
                                <p class=" mt-5  atc-type-picanto">
                                   {{$ads[0]->Detail}}
                                </p>
                            </div>
                        </div>
                            
                    </div>
                        
                        
                        
                        <div class="col-md-5">
                            <aside class="side_content">
                            <div class="box w-100 dealer_details">
                                <div class="content_1  box-body">
                                        
                                    <!--<img class="dealer_details_img" src="https://dealerlogo.atcdn.co.uk/at2/adbranding/10014293/images/fpa_logo.gif" alt="">-->
                                    <a href="{{ route('SellersDetails',$ads[0]->customer_id) }}"><h3 class="dealer_details_link ">{{$ads[0]->sellerName}}</h3></a>
                                        
                                        
                                    
                                    <div class="chat-with-seller offline">
                                        <span class="svg-holder chat-with-seller__icon">
                                        <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                                            <path
                                                d="M2.8 2.4a.9.9 0 0 1 1.53-.76L19.8 17.09a.9.9 0 0 1-1.27 1.27l-.36-.36H6l-4 4V4a2 2 0 0 1 .8-1.6zM4.17 4H4v13.17L5.17 16h10.99l-2.38-2.38A1 1 0 0 1 13 14H7a1 1 0 0 1-1-1 1 1 0 0 1 1-1h5.16l-1-1H7a1 1 0 1 1 0-2h2.16l-1-1H7a1 1 0 0 1-.62-1.78L4.16 4zM20 14.73V4H9.27l-2-2H20a2 2 0 0 1 2 2v12c0 .22-.04.43-.1.63l-1.9-1.9zM14.27 9H17a1 1 0 1 1 0 2h-.73l-2-2zm-3-3H17a1 1 0 1 1 0 2h-3.73l-2-2z"
                                            ></path>
                                            </svg>
                                        <!-- <i class="fa fa-comments-o fa-2x" aria-hidden="true"></i>-->
                                        </span>
                                        </span>
                                        <div class="chat-with-seller__label-container">
                                        <div class="chat-with-seller--status atc-type-smart">
                                            seller offline
                                        </div>
                                        <span class="chat-with-seller__label atc-type-picanto"
                                            >Chat unavailable</span
                                        >
                                        </div>
                                    </div>
                                    <div class="dealer_detail_tel">
                                        <p>
                                        Or call:
                                        <a href="#"><span>{{$ads[0]->contact}}</span></a>
                                        </p>
                                    </div>



             <!-- modal for Approved button  -->
<div id="AdApprovedModal" class="modal modal-success fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
        <div class="modal-content">
             

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-center" id="custom-width-modalLabel">Approved AD Record</h4>
            </div>
            <div class="modal-body">
                <h4>You Want You Sure Approve This Record?</h4>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <a href="{{ route('approved',$ads[0]->id) }}" class="btn btn-success waves-effect remove-data-from-delete-form">Approved</a>
            </div>

          
        </div>
    </div>
</div>
<!-- modal for Approved button  -->






<!-- modal for delete button  -->
<div id="AdDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
        <div class="modal-content">
             <form action="{{route('Ad_delete')}}" method="POST" class="remove-record-model">
               {{ method_field('delete') }}
               {{ csrf_field() }}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-center" id="custom-width-modalLabel">Delete AD Record</h4>
            </div>
            <div class="modal-body">
                <h4>You Want You Sure Delete This Record?</h4>
                <input type="hidden", name="ad_id" id="Ad_id">
                <div class="form-group">
                <label >Reason:</label>
                <input type="text" class="form-control" name="reason" id="reason" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
            </div>

             </form>
        </div>
    </div>
</div>
<!-- modal for delete button  -->



                                    <div class="btn-row">

                                         @if($ads[0]->Approved_id == 2 && $ads[0]->Delete_id == 2)

                                        <a  class="cs-button  cs-btn-primary approvedAd">Approved</a>
                                        <a  class="cs-button cs-btn-tertiary deleteAd" data-adid="{{$ads[0]->id}}">Delete</a>
                                       
                                        @elseif($ads[0]->Approved_id == 2)
                                       
                                        <a  class="cs-button  cs-btn-primary approvedAd">Approved</a>
                                       
                                        @elseif($ads[0]->Delete_id == 2)
                                        <!-- <a class="btn btn-success" href=""></a> -->
                                        <a  class="cs-button cs-btn-tertiary deleteAd" data-adid="{{$ads[0]->id}}">Delete</a>
                                        @endif
                                    </div>
                                    
                                    
                                    
                                </div>
                            </div>
                            
                            <div class="box w-100 mt-5 mb-5 dealer_details">
                                <div class="box-body">
                                    <h5 class="card-title">About this seller</h5>
                                    <!--<img class="dealer_details_img" src="https://dealerlogo.atcdn.co.uk/at2/adbranding/10014293/images/fpa_logo.gif" alt="">-->
                                    <!--<a href="#"><h3 class="dealer_details_link">Startin Peugeot (Worcester)</h3></a>-->
                                </div>
                            </div>
                            
                            
                            </aside>
                        </div>
                        </div>
               </div>
             </div>
             </div>
             </div>
        </section>                            

@else <h1>Record not Correctly found!</h1>

@endif
<script>
 jQuery("#success").delay(1000).fadeOut("slow");
$(document).on('click','.deleteAd', function(){

    var Ad_id = $(this).attr('data-adid');
     $('#Ad_id').val(Ad_id);
     $('#AdDeleteModal').modal('show');

});

$(document).on('click','.approvedAd', function(){

 $('#AdApprovedModal').modal('show');

});
</script>







@endsection