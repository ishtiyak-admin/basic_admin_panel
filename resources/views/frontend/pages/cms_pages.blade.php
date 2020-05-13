@extends('layouts.app')
@section('content')
   <div class="warper">
      <div class="inner_warper">
         <div class="container">
            <div class="customer_notification_bg cms_pages">
               <div class="notification_bg">
                  <div class="notification_head">
                     <h2>{{ title_case($record->title) }}</h2>  
                  </div>
                  <div class="static_pages_content">
                     {!! $record->content !!}
                  </div>         
               </div>   
            </div> 
         </div>
      </div>
   </div>
@endsection
@section('scripts')
   <script type="text/javascript">
      var y = document.getElementsByClassName("cms_pages")[0].getElementsByTagName("img");
      for (var i = 0; i < y.length; i++) { y[i].style.maxWidth = "100%"; } 
   </script>
@endsection