<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo e(url('favicon.ico')); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo e(url('favicon.ico')); ?>" type="image/x-icon">
        <title><?php echo e((getSettings('site-title'))? getSettings('site-title') : env("APP_NAME", "Laravel")); ?></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <img src="<?php echo e(url('public/uploads/logo.png')); ?>" width="100px">
                <div class="title m-b-md">
                    <?php echo e((getSettings('site-title'))? getSettings('site-title') : env("APP_NAME", "Laravel")); ?>

                </div>
                <div class="links">
                    <a href="javascript:void(0);">Coming Soon</a>
                </div>
                <div class="links">
                    <a href="<?php echo e(url('pages/faqs')); ?>">FAQs</a>
                    <a href="<?php echo e(url('pages/terms-conditions')); ?>">Terms & Conditions</a>
                    <a href="<?php echo e(url('pages/privacy-policy')); ?>">Privacy Policy</a>
                    <a href="<?php echo e(url('pages/about-us')); ?>">About Us</a>
                    <a href="<?php echo e(url('pages/contact-us')); ?>">Contact Us</a>
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH /opt/lampp/htdocs/helthiago/resources/views/welcome.blade.php ENDPATH**/ ?>