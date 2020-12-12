<div class="panel panel-default">
    
    <div class="h3">Update SubCategory</div>
    {{-- dislaying SubCategory related Category  Livewire--}}
    
    
    

<div class="panel-body">
    <div class="form-inline">
        <div class="input-group">
            SubCategory Label
            {{-- label model Livewire--}}
            <input wire:model="label" type="text" class="form-control input-sm">
        </div>

       
        <div class="input-group">
            <br>
            {{-- update model Livewire--}}
            <button wire:click="update()" class="btn btn-default">Save</button>
            {{-- subCategory updating Livewire--}}
            <div wire:loading wire:target="update">Updating...</div>
        </div>
    </div>
</div>
</div>