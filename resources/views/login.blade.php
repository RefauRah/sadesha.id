<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
		
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('theme/img/favicon.ico')}}">
		
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">    
		
    <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">
		
    <link rel="stylesheet" href="{{asset('theme/css/font-awesome.min.css')}}">
		
    <link rel="stylesheet" href="{{asset('theme/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/owl.transitions.css')}}">    
		
    <link rel="stylesheet" href="{{asset('theme/css/animate.css')}}">    
		
    <link rel="stylesheet" href="{{asset('theme/css/normalize.css')}}">
		
    <link rel="stylesheet" href="{{asset('theme/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
		
    <link rel="stylesheet" href="{{asset('theme/css/wave/waves.min.css')}}">
		
    <link rel="stylesheet" href="{{asset('theme/css/notika-custom-icon.css')}}">
		
    <link rel="stylesheet" href="{{asset('theme/css/main.css')}}">
		
    <link rel="stylesheet" href="{{asset('theme/style.css')}}">
		
    <link rel="stylesheet" href="{{asset('theme/css/responsive.css')}}">
		
    <script src="{{asset('theme/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
    <form action="login" method="post">
        @csrf
        <div class="login-content">        
            <div class="nk-block toggled" id="l-login">
                <div class="nk-form">
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                        <div class="nk-int-st">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <input type="password" name="password" class="form-control" placeholder="Password">                           
                        </div>
                    </div>                
                    <button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
                </div>           
            </div>            
        </div> 
    </form> 

    <script src="{{asset('theme/js/vendor/jquery-1.12.4.min.js')}}"></script>

    <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
   	
    <script src="{{asset('theme/js/wow.min.js')}}"></script>
    
    <script src="{{asset('theme/js/jquery-price-slider.js')}}"></script>
	
    <script src="{{asset('theme/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('theme/js/jquery.scrollUp.min.js')}}"></script>
  	
    <script src="{{asset('theme/js/meanmenu/jquery.meanmenu.js')}}"></script>

    <script src="{{asset('theme/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('theme/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('theme/js/counterup/counterup-active.js')}}"></script>
    
    <script src="{{asset('theme/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  	
    <script src="{{asset('theme/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('theme/js/sparkline/sparkline-active.js')}}"></script>
  	
    <script src="{{asset('theme/js/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('theme/js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('theme/js/flot/flot-active.js')}}"></script>
	
    <script src="{{asset('theme/js/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('theme/js/knob/jquery.appear.js')}}"></script>
    <script src="{{asset('theme/js/knob/knob-active.js')}}"></script>
 	
    <script src="{{asset('theme/js/chat/jquery.chat.js')}}"></script>

    <script src="{{asset('theme/js/wave/waves.min.js')}}"></script>
    <script src="{{asset('theme/js/wave/wave-active.js')}}"></script>
 
    <script src="{{asset('theme/js/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('theme/js/icheck/icheck-active.js')}}"></script>
 
    <script src="{{asset('theme/js/todo/jquery.todo.js')}}"></script>

    <script src="{{asset('theme/js/login/login-action.js')}}"></script>
  
    <script src="{{asset('theme/js/plugins.js')}}"></script>
 
    <script src="{{asset('theme/js/main.js')}}"></script>
</body>
</html>