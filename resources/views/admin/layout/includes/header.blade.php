<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="{{route('admin.view')}}">Admin</a></h1>
                </div>
            </div>

            <div class="col-md-2 pull-right">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 @auth
                                    Welcome {{ Auth::user()->name }}      
                                    @endauth
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu animated fadeInUp">
                                <li><a href="{{route('shop.home') }}">Shop</a></li>
                                    <li >
                                        <a  href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                           
                            

                                
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>