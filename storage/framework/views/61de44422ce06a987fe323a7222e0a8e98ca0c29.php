
<?php $__env->startSection('content'); ?>
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
                     <?php if($records->count() > 0): ?>
                        <!--Accordion wrapper-->
                        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                           <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <!-- Accordion card -->
                              <div class="card">
                                 <!-- Card header -->
                                 <div class="card-header" role="tab" id="headingOne<?php echo e($key); ?>">
                                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne<?php echo e($key); ?>" aria-expanded="<?php echo e(($key==0)? 'true':'false'); ?>" aria-controls="collapseOne<?php echo e($key); ?>">
                                       <h5 class="mb-0">
                                          <?php echo e($record->question); ?> <i class="fas fa-angle-down rotate-icon" style="float: right;"></i>
                                       </h5>
                                    </a>
                                 </div>
                                 <!-- Card body -->
                                 <div id="collapseOne<?php echo e($key); ?>" class="collapse <?php echo e(($key==0)? 'show':''); ?>" role="tabpanel" aria-labelledby="headingOne<?php echo e($key); ?>"
                                    data-parent="#accordionEx">
                                    <div class="card-body"><?php echo $record->answer; ?></div>
                                 </div>
                              </div>
                              <!-- Accordion card -->
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- Accordion wrapper -->
                     <?php else: ?>
                        <div class="cart_empty_bg">
                           <div class="cart_empty_inner">
                              <div class="cart_ger"><img src="<?php echo e(url('public/frontend/img/inner_logo.png')); ?>"/></div>  
                              <div class="cart_empty_des">
                                 <h3>No Faqs to show</h3>
                              </div>
                           </div>  
                        </div> 
                     <?php endif; ?>
                  </div>
                 </div>
                </div>
               </div>   
            </div> 
         </div>
      </div>
   </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
   <script type="text/javascript">
      var y = document.getElementsByClassName("faq_page")[0].getElementsByTagName("img");
      for (var i = 0; i < y.length; i++) { y[i].style.maxWidth = "100%"; } 
   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/helthiago/resources/views/frontend/pages/faqs.blade.php ENDPATH**/ ?>