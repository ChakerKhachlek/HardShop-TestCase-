@extends('admin.layout.admin')
@section('content')
   <h3>@auth 
                                    Welcome : {{ Auth::user()->name }}      
                                    @endauth</h3>  

                                    <body>
                                       
                                    </body>
@endsection
