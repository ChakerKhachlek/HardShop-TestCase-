<div class="panel panel-default" >
    
    <div class="h3">Create SubCategory</div>
    @if($selectedCategory)
     {{-- displaying SubCategory Category Livewire--}}
    <div>Category name :{{$selectedCategory->label}}</div>
    @endif


<div class="panel-body">
    <div class="form-inline">

        <div class="input-group">
            SubCategory Label
            {{-- label model Livewire--}}
            <input wire:model="label" type="text" class="form-control input-sm">
        </div>
       

    </div>

    <div class="input-group">
        <br>
        {{-- store method for episode Livewire--}}
        <button wire:click="store()" class="btn btn-default">Save</button>
        {{-- episode storing Livewire--}}
        <div wire:loading wire:target="store">Creating...</div>
    </div>
</div>
</div>