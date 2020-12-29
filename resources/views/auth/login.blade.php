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
               
                <form method="POST" action="{{ route('login') }}" >
                    <div> <a href="{{ route('register') }}" style="text-color: rgb(226, 19, 216)226)">Or register </a></div>
                    @csrf

					<input id="email" type="text" name="email" placeholder="Email" required autocomplete="email" autofocus/>
                   
                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                   
                   
                    <input type="password"  name="password" class="padding" placeholder="Password" @error('password') is-invalid @enderror required=""/>
                   
                    @error('password')
                    <span >
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <span>
                    <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                    </span>
              
                    <div style="padding-top: 20px">
                    <input type="submit" 
                        {{ __('Login') }}
                    />
                    </div>
                    @if (Route::has('password.request'))
                    <div style="padding-top: 20px">
                        <a  href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                    @endif
				</form>
			</div>
		  <div class="clear"> </div>
		</div>
		
		<div class="footer">
		<p>© 2020 . All Rights Reserved | Online Heaven Platform </a></p>
		</div>
	</div>
</body>
</html>