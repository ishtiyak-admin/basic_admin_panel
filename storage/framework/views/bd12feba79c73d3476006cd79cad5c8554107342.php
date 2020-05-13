<?php echo $__env->make('backend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backend.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('backend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('scripts'); ?><?php /**PATH /opt/lampp/htdocs/recbreaker/resources/views/layouts/admin.blade.php ENDPATH**/ ?>