<div class="panel panel-default" style="margin-top: 5px" >
    
    <div class="h3">Update Product</div>
  


<div class="panel-body">
    <div class="form-inline">

        <div class="input-group">
            Product Label
            {{-- label model Livewire--}}
            <input wire:model="label" type="text" class="form-control input-sm">
        </div>

        <div class="input-group">
            Product description
            {{-- description model Livewire--}}
            <input wire:model="description" type="text" class="form-control input-sm">
        </div>

        <div class="input-group">
            Product quantity
            {{-- quantity model Livewire--}}
            <input wire:model="quantity" type="text" class="form-control input-sm">
        </div>


        <div class="input-group">
            Product price
            {{-- price model Livewire--}}
            <input wire:model="price" type="text" class="form-control input-sm">
        </div>

        <div class="input-group">
            Product image
            {{-- image model Livewire--}}
            <input wire:model="image" type="file" class="form-control input-sm">
            {{-- image uploading Livewire--}}
        <div wire:loading wire:target="image">Uploading...</div>
        </div>

        <div class="input-group">
            Is Custumizble ?
            {{-- isCustumizble model Livewire--}}
            <input type="checkbox" value="1" wire:model="isCustumizble">
        </div>
        
        @foreach($selectedSubCategory->attributs as $key=>$a)
        <div class="input-group">
            {{$a->name}}
            {{-- isCustumizble model Livewire--}}
        <input type="text" value="" wire:model="attributValues.{{$key}}">
        </div>
        @endforeach
        

       

    </div>

    <div class="input-group">
        <br>
        {{-- update method for Product Livewire--}}
        <button wire:click="updateProduct()" class="btn btn-default">Save</button>
        {{-- Product updating Livewire--}}
        <div wire:loading wire:target="updateProduct">Updating...</div>
    </div>
</div>
</div>