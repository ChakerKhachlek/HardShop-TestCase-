<div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Category :</label>
        {{-- Category model  Livewire--}}
        <select name="category" wire:model="category" class="border shadow p-2 bg-white">
            <option value=''>Choose a category</option>
            {{-- selecting categories  Livewire--}}
            @foreach($categories as $category)
                <option value={{$category->id }}>{{ $category->label }}</option>
            @endforeach
          
        </select>

        @if($createButton )
        {{-- not default season activate createMode Livewire--}}
        <button wire:click="createMode()" class="btn btn-xs btn-primary">Create New</button>
         @endif
        
    </div>
    

    @if(count($subCategories) > 0){{-- if categories has subCategories Livewire--}}
            <div>
                <div class="h3" >Sub Categories</div>
            @foreach($subCategories as  $s)
                {{-- displaying subCategories Livewire--}}
                <hr class="solid">
                <div class="h5" style="color:red">Name : {{$s->label}}  
                {{-- episode edit and destroy methods Livewire--}}
                <button wire:click="editMode({{ $s->id }})" class="btn btn-xs btn-warning">edit</button>
                <button wire:click="destroyEpisode({{ $s->id }})" class="btn btn-xs btn-danger">delete</button>
                <button wire:click="createSubCategory({{$s->id}})" class="btn btn-xs btn-primary">Add Attribut</button>
            </div>
               <div style="margin-top:5px">
                   @if(count($s->attributs()->get()) !=0)

                   <p style="color:blue">Attributs :</p>
                   @foreach($s->attributs()->get() as $a)
                   {{$a->name}}  
                    <button wire:click="destroyAttribut({{$a->id}})" class="btn btn-xs btn-success">delete</button>
                   @endforeach

                   @endif
            </div>

                @endforeach
                
            </div>

    @endif        
    
   
  

<div style="padding-top: 30px">
        {{-- creation and updating area Livewire--}}
    @if ($createMode)
        @include('livewire.admin.subCategory.createSubCategory')
    @elseif($updateMode)
        @include('livewire.admin.subCategory.updateSubCategory')
    @elseif($attributCreationMode)
        @include('livewire.admin.subCategory.attributCreation');
    @endif

</div>

</div>