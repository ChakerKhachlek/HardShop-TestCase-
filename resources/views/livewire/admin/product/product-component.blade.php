<div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Sub Category :</label>
        {{-- subCategory model  Livewire--}}
        <select name="subCategory" wire:model="subCategory" class="border shadow p-2 bg-white">
            <option value=''>Choose a Sub Category</option>
            {{-- selecting subCategory Livewire--}}
            @foreach($subCategories as $s)
                <option value={{$s->id }}>{{ $s->label }}</option>
            @endforeach
          
        </select>

        @if($selectedSubCategory)
        <div>
        <table class="table table-bordered table-condensed">
            <tr>
                <td>ID</td>
                <td>Label</td>
                <td>Description</td>
                <td>Quantity</td>
                <td>PRICE</td>
                <td>IMAGE</td>
                <td>Custimzble?</td>
                <td>attributs</td>
            </tr>
            {{-- products Livewire--}}
            @foreach($subCategoryProducts as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->label}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->quantity}}</td>
                    <td>{{$row->price}}</td>
                    <td><img src="{{asset($row->image)}}" width="50" height="50"></td>
                    <td>
                        @if($row->isCustumizble)
                        yes
                        @else
                        no
                        @endif
                    </td>
                    <td>
                        @foreach($row->attributsValues as $ass)
                        {{$ass->attribut->name}} : {{$ass->value}} <br>
                        @endforeach
                    </td>
                    <td width="100">
                        {{-- serie edit and destroy methods Livewire--}}
                        <button wire:click="updateMode({{$row->id}})" class="btn btn-xs btn-warning">Edit</button>
                        <button wire:click="destroyProduct({{$row->id}})" class="btn btn-xs btn-danger">Del</button>
                    </td>
                </tr>
            @endforeach
        </table>
        <button wire:click="createModeOn()" class="btn btn-xs btn-primary">Create New</button>
    </div>
     
       
        @endif

     
        
    </div>

    @if ($createMode)
    @include('livewire.admin.product.createProduct')
    @elseif($updateMode)
    @include('livewire.admin.product.updateProduct')
    @endif
    

   
 


</div>