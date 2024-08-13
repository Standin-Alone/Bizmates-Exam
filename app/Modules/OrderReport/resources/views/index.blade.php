<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title>Cultivated Commerce</title>


    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{url('assets/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/plugins/animate/animate.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/default/style.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/default/style-responsive.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/default/theme/default.css')}}" rel="stylesheet" id="theme" />
    <link href="{{url('assets/css/login_module/style.css')}}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{url('/assets/plugins/pace/pace.min.js')}}"></script>
    <!-- ================== END BASE JS ================== -->

    <style>
        #submit-btn {
            font-size: 14px;
        }

        .swal2-title {
            font-size: 20px !important;
        }

        .swal2-button {
            font-size: 20px !important;
        }
    </style>
</head>

<body class="pace-top bg-white">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade" style="background-color:rgba(255,255,255,0.7)">
        <!-- begin report -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(assets/img/ecommerce.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b style="text-shadow: 4px 4px #000;">Cultivated Commerce</b> </h4>
                    <p>

                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin report-header -->
                <div class="login-header">
                    <div class="brand">                        
                        <center>
                            <b>Cultivated Commerce</b>
                        </center>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end report-header -->
                <!-- begin report content -->
                <div class="login-content">
                    <form id="report-form" method="POST"  class="margin-bottom-0">
                        @csrf
                        <span class="error_email_pass"></span>
                        <div class="form-group m-b-15">
                            <input id="user_email" type="date" name="order_date" class="form-control form-control-lg" placeholder="Email Address" />                 
                        </div>
                        <div class="form-group m-b-15">
                            <select name="report_type" class=" form-control  bold select2" id="report-type">
                                <option selected disabled><-- Select Report Type --></option>
                                <option value="Addresses">Addresses</option>
                                <option value="Packing">Packing Summary</option>
                                <option value="Daily">Daily Order Summary</option>
                            </select>                        
                        </div>

                        <div class="login-buttons">
                            <button type="submit" id="submit-btn" class="btn btn-success btn-block btn-lg btn-log"><i></i> Export</button>
                        </div>

                        <hr />

                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->

    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{url('assets/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{url('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
    <!--[if lt IE 9]>
	<script src="../assets/crossbrowserjs/html5shiv.js"></script>
	<script src="../assets/crossbrowserjs/respond.min.js"></script>
	<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
    <script src="{{url('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('assets/plugins/js-cookie/js.cookie.js')}}"></script>
    <script src="{{url('assets/js/theme/default.min.js')}}"></script>
    <script src="{{url('assets/js/apps.min.js')}}"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{url('assets/plugins/parsley/dist/parsley.js')}}"></script>
    <script src="{{url('assets/plugins/highlight/highlight.common.js')}}"></script>
    <script src="{{url('assets/js/demo/render.highlight.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        $(document).ready(function() {
            App.init();
            $("#report-type").select2();
            $("#report-form").validate({
                rules:{
                    order_date:"required",
                    report_type:"required"
                },
                errorPlacement: function(label, element) {
                if (element.hasClass('select2')) {
                label.insertAfter(element.next('.select2-container')).addClass('mt-2 text-danger');
                select2label = label
                } else {
                label.addClass('mt-2 text-danger');
                label.insertAfter(element);
                }
            },
                messages:{
                    order_date:`<span class="error_msg text-danger">Please input this required field.</span>`,
                    report_type:`<span class="error_msg text-danger">Please input this required field.</span>`,
                },
                submitHandler:function(){
                    let order_date = $("input[name=order_date]").val();
                    let report_type = $("select[name=report_type] :selected").val();
                    let limit_condition = order_date == '2024-07-26' || order_date == '2024-07-27' ? 60 : order_date == '2024-07-25' ? 40 : 20;
                


                    window.location = `{{route('generate-report')}}?order_date=${order_date}&report_type=${report_type}&limit_condition=${limit_condition}`;
                    
         
                }
            });        
            
        
            let msg = '{{Session::get('alert')}}';
            let exist = '{{Session::has('alert')}}';
            if(exist){
                alert(msg);
            }
                                     
        });
    </script>
</body>

</html>