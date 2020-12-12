<!DOCTYPE html>
<html>

<head>
<title>Gaming Login Form Responsive Widget Template  :: w3layouts</title>
<link rel="shortcut icon"  href="{{ asset('assetsStream/logos/LogoMakr_4neFgL.png') }}" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gaming Login Form Widget Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{asset('assetsAuth/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<div class="padding-all">
		<div class="header">
			<h1> Login</h1>
		</div>

		<div class="design-w3l">
			<div class="mail-form-agile">
               
                @if (session('error'))
                    <div class="alert alert-danger">
                      {{ session('error') }}
                    </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                          
                        </div>
                    @endif

                    You are logged in as a User!
                    @auth 
                    @if((Auth::user()->is_admin)==1)
                    <h5>Welcome Admin : {{ Auth::user()->name }} </h5>
                    <a href="{{route('admin.view')}}">Go to Admin Panel</a>  
                    @else
                    <h5>Welcome User : {{ Auth::user()->name }} </h5>
                    <a href="{{route('welcome.view')}}">Go to Forum</a> 
                    @endif
                    @endauth 

			</div>
		  <div class="clear"> </div>
		</div>
		
		<div class="footer">
		<p>© 2020 . All Rights Reserved | Online Heaven Platform </a></p>
		</div>
	</div>
</body>
</html>