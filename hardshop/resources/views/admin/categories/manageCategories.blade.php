@extends('admin.layout.admin')
@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div >
            <div class="h1">Manage Categories</div>
            {{-- Calling categories management component (Livewire blade) --}}
            @livewire('admin.category-component')
           
        </div>
    </div>
</div>

@endsection