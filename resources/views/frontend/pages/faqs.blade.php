@extends('layouts.app')
@section('content')
   <div class="warper">
      <div class="inner_warper">
         <div class="container">
            <div class="customer_notification_bg faq_page">
               <div class="notification_bg">
                <div class="row"> 
                 <div class="col-md-12">
                  <div class="notification_head">
                     <h2>FAQs</h2>  
                  </div>
                  <div class="faq_bg">
                     @if($records->count() > 0)
                        <!--Accordion wrapper-->
                        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                           @foreach($records as $key=>$record)
                              <!-- Accordion card -->
                              <div class="card">
                                 <!-- Card header -->
                                 <div class="card-header" role="tab" id="headingOne{{$key}}">
                                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne{{$key}}" aria-expanded="{{ ($key==0)? 'true':'false' }}" aria-controls="collapseOne{{$key}}">
                                       <h5 class="mb-0">
                                          {{$record->question}} <i class="fas fa-angle-down rotate-icon" style="float: right;"></i>
                                       </h5>
                                    </a>
                                 </div>
                                 <!-- Card body -->
                                 <div id="collapseOne{{$key}}" class="collapse {{ ($key==0)? 'show':'' }}" role="tabpanel" aria-labelledby="headingOne{{$key}}"
                                    data-parent="#accordionEx">
                                    <div class="card-body">{!!$record->answer!!}</div>
                                 </div>
                              </div>
                              <!-- Accordion card -->
                           @endforeach
                        </div>
                        <!-- Accordion wrapper -->
                     @else
                        <div class="cart_empty_bg">
                           <div class="cart_empty_inner">
                              <div class="cart_ger"><img src="{{ url('public/frontend/img/inner_logo.png') }}"/></div>  
                              <div class="cart_empty_des">
                                 <h3>No Faqs to show</h3>
                              </div>
                           </div>  
                        </div> 
                     @endif
                  </div>
                 </div>
                </div>
               </div>   
            </div> 
         </div>
      </div>
   </div>
@endsection
@section('scripts')
   <script type="text/javascript">
      var y = document.getElementsByClassName("faq_page")[0].getElementsByTagName("img");
      for (var i = 0; i < y.length; i++) { y[i].style.maxWidth = "100%"; } 
   </script>
@endsection