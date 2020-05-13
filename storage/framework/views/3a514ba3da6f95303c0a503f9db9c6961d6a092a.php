<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(url('favicon.ico')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(url('favicon.ico')); ?>" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e((getSettings('site-title'))? getSettings('site-title') : env("APP_NAME", "Laravel")); ?></title>
    <!-- Scripts -->
    <script src="<?php echo e(asset('public/js/app.js')); ?>" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="<?php echo e(asset('public/css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(url('public/uploads/logo.png')); ?>" width="200px">
                    <!-- <?php echo e((getSettings('site-title'))? getSettings('site-title') : env("APP_NAME", "Laravel")); ?> -->
                </a>
            </div>
        </nav>
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/helthiago/resources/views/layouts/app.blade.php ENDPATH**/ ?>