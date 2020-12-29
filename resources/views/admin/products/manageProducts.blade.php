@extends('admin.layout.admin')
@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div >
            <div class="h1">Manage Sub Categories</div>
            {{-- Calling categories management component (Livewire blade) --}}
            @livewire('admin.product-component')
           
        </div>
    </div>
</div>

@endsection