<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <title>后台管理系统</title>

    <link rel="stylesheet" href="/public/static/admin/assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/xenon-core.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/xenon-forms.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/xenon-components.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/xenon-skins.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/custom.css">

    <script src="/public/static/admin/assets/js/jquery-1.11.1.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body login-page">


<div class="login-container">

    <div class="row">

        <div class="col-sm-6">

            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    // Reveal Login form
                    setTimeout(function () {
                        $(".fade-in-effect").addClass('in');
                    }, 1);


                    // Validation and Ajax action
                    $("form#login").validate({
                        rules: {
                            username: {
                                required: true
                            },

                            passwd: {
                                required: true
                            }
                        },

                        messages: {
                            username: {
                                required: '请输入您的用户名'
                            },

                            passwd: {
                                required: '请输入您的密码'
                            }
                        },

                        // Form Processing via AJAX
                        submitHandler: function (form) {
                            show_loading_bar(70); // Fill progress bar to 70% (just a given value)

                            var opts = {
                                "closeButton": true,
                                "debug": false,
                                "positionClass": "toast-top-full-width",
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };

                            $.ajax({
                                url: "/action/login-check",
                                type: 'post',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    username: $(form).find('#username').val(),
                                    passwd: $(form).find('#passwd').val(),
                                },
                                success: function (resp) {
                                    show_loading_bar({
                                        delay: .5,
                                        pct: 100,
                                        finish: function () {

                                            // Redirect after successful login page (when progress bar reaches 100%)
                                            if (resp.accessGranted) {
                                                window.location.href = '/{{config('webset.webdir')}}';
                                            }
                                            else {
                                                toastr.error("您输入了一个错误的账户或者密码 <strong></strong> :)", "登录失败", opts);
                                                $passwd.select();
                                            }
                                        }
                                    });

                                }
                            });

                        }
                    });

                    // Set Form focus
                    $("form#login .form-group:has(.form-control):first .form-control").focus();
                });
            </script>

            <!-- Errors container -->
            <div class="errors-container">


            </div>

            <!-- Add class "fade-in-effect" for login form effect -->
            <form method="post" role="form" id="login" class="login-form fade-in-effect">

                <div class="login-header">
                    <a href="#" class="logo">
                        <img src="/public/static/admin/assets/images/logo@2x.png" alt="" width="80"/>
                        <span>后台管理系统</span>
                    </a>

                    <p>自动采集影视系统</p>
                </div>


                <div class="form-group">
                    <label class="control-label" for="username">用户名</label>
                    <input type="text" class="form-control input-dark" name="username" id="username"
                           autocomplete="off"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="passwd">密码</label>
                    <input type="password" class="form-control input-dark" name="passwd" id="passwd"
                           autocomplete="off"/>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark  btn-block text-left">
                        <i class="fa-lock"></i>
                        登录
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>
<!-- Bottom Scripts -->
<script src="/public/static/admin/assets/js/bootstrap.min.js"></script>
<script src="/public/static/admin/assets/js/TweenMax.min.js"></script>
<script src="/public/static/admin/assets/js/resizeable.js"></script>
<script src="/public/static/admin/assets/js/joinable.js"></script>
<script src="/public/static/admin/assets/js/xenon-api.js"></script>
<script src="/public/static/admin/assets/js/xenon-toggles.js"></script>
<script src="/public/static/admin/assets/js/jquery-validate/jquery.validate.min.js"></script>


<!-- Imported scripts on this page -->
<script src="/public/static/admin/assets/js/xenon-widgets.js"></script>
<script src="/public/static/admin/assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
<script src="/public/static/admin/assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
<script src="/public/static/admin/assets/js/toastr/toastr.min.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="/public/static/admin/assets/js/xenon-custom.js"></script>

</body>
</html>
