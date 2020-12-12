<div>
<head>

  <title>HardShop</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('assetsShop/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="{{asset('assetsShop/css/shop-homepage.css')}}" rel="stylesheet">
  @livewireStyles
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">HardShop ( Made For Test Case )</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Configure Your Pc</a>
          </li>
        
        </ul>
      </div>
    </div>
  </nav>

    <div>
    {{$slot}}
    </div>
    
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your HardShop 2020</p>
    </div>
   
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('assetsShop/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assetsShop/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  @livewireScripts
</body>


