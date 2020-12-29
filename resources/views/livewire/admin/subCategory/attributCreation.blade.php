<div class="panel panel-default" >
    
    <div class="h3">Add Attribut</div>
    @if($selectedSubCategory)
     {{-- displaying SubCategory Category Livewire--}}
    
    <div>Sub Category name :{{$selectedSubCategory->label}}</div>
    @endif


<div class="panel-body">
    <div class="form-inline">

        <div class="input-group">
            Attribut Name
            {{-- label model Livewire--}}
            <input wire:model="attributName" type="text" class="form-control input-sm">
        </div>
       

    </div>

    <div class="input-group">
        <br>
        {{-- store method for episode Livewire--}}
        <button wire:click="storeAttributName()" class="btn btn-default">Save</button>
        {{-- episode storing Livewire--}}
        <div wire:loading wire:target="storeAttributName">Creating...</div>
    </div>
</div>
</div>