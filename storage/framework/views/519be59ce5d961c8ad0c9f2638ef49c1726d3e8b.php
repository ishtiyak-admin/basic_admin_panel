<?php $__env->startSection('content'); ?>
   <div class="warper">
      <div class="inner_warper">
         <div class="container">
            <div class="customer_notification_bg cms_pages">
               <div class="notification_bg">
                  <div class="notification_head">
                     <h2><?php echo e(title_case($record->title)); ?></h2>  
                  </div>
                  <div class="static_pages_content">
                     <?php echo $record->content; ?>

                  </div>         
               </div>   
            </div> 
         </div>
      </div>
   </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
   <script type="text/javascript">
      var y = document.getElementsByClassName("cms_pages")[0].getElementsByTagName("img");
      for (var i = 0; i < y.length; i++) { y[i].style.maxWidth = "100%"; } 
   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/helthiago/resources/views/frontend/pages/cms_pages.blade.php ENDPATH**/ ?>