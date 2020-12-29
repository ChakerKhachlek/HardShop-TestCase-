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
			<h1> Register</h1>
		</div>

		<div class="design-w3l">
			<div class="mail-form-agile">
               
                <form method="POST" action="{{ route('register') }}" >
                    <div> <a href="{{ route('login') }}" style="text-color: rgb(226, 19, 216)226)">Or Login </a></div>
                    @csrf
                    <input id="name" type="text" name="name" placeholder="Username" required autocomplete="name" autofocus/>

                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

					<input id="email" type="text" name="email" placeholder="Email" required autocomplete="email" autofocus/>
                   
                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                   
                   
                    <input type="password"  name="password"  placeholder="Password" @error('password') is-invalid @enderror required=""/>
                   
                    @error('password')
                    <span >
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                    <div style="padding-top: 20px">
                    <input type="submit" 
                        {{ __('Register') }}
                    />
                    </div>
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