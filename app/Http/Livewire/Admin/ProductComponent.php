<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use App\Models\SubCategory;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProductComponent extends Component
{
    use WithFileUploads;
    
    public $subCategories;
    //model string
    public $subCategory;
    public $selectedSubCategory;
    public $subCategoryProducts;
    public $label,$description,$quantity,$price,$image,$image_local_url;
    public $isCustumizble=0;

    public $attributValues=[];

    public $selectedProductId;
    public $createMode=false;
    public $updateMode=false;

    public function render()
    {
        
    
        $this->selectedSubCategory=SubCategory::find($this->subCategory);

        if(!empty($this->selectedSubCategory)){
            $this->subCategoryProducts=$this->selectedSubCategory->products()->get();
        }

        $this->subCategories=SubCategory::all();
        return view('livewire.admin.product.product-component');
    }

    public function resetInput(){
        $this->label=null;
        $this->description=null;
        $this->quantity=null;
        $this->price=null;
        $this->image=null;
        $this->image_local_url=null;
        $this->attributValues=[];

    }

    public function createModeOn(){
        $this->resetInput();
        $this->createMode=true;
    }

    public function storeProduct(){
       $this->validate([
            'label' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'image|mimes:png,jpg,jpeg|max:10000',
        ]);
        
        $this->image->store("images",'public');
        $this->image_local_url=$this->image->store("images",'public');

        $this->selectedSubCategory=SubCategory::find($this->subCategory);
        $product=$this->selectedSubCategory->products()->create([
            'label' => $this->label,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'image' => $this->image_local_url,
            'isCustumizble' => $this->isCustumizble, 
             ]);
            $i=0;
             foreach ($this->selectedSubCategory->attributs()->get() as $key=>$value) {
                $product->attributsValues()->create([
                    'product_attribut_id' => $value->id,
                    'value' => $this->attributValues[$key]
                ]);
                $i++;
             }

             $this->createMode=false;
             $this->resetInput();
    }

    public function updateMode($id){
        $record=Product::findOrFail($id);
        $this->label=$record->label;
        $this->description=$record->description;
        $this->quantity=$record->quantity;
        $this->price=$record->price;
        $this->isCustumizble=$record->isCustumizble;
        if($record->attributsValues()->count() >0)
        {
        foreach($this->selectedSubCategory->attributs as $key=>$a){
            $value=$record->attributsValues->where('product_attribut_id',$a->id)->first();
            
            $this->attributValues[$key]=$value->value;

        }
    }

        $this->selectedProductId=$id;
        $this->updateMode=true;
    }

    public function updateProduct(){
        $this->validate([
            'label' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
           
        ]);
        $record = Product::find($this->selectedProductId);

        if(!empty($this->image)){
            $this->image->store("images",'public');
            $image_local_url=$this->image->store("images",'public');
            $record->update([
                'image' => $image_local_url,
                 ]);
        }
        
        $record->update([
            'label' => $this->label,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'isCustumizble' => $this->isCustumizble, 
             ]);

             if($record->attributsValues()->count() >0)
        {
        foreach($this->selectedSubCategory->attributs as $key=>$a){
            $value=$record->attributsValues()->where('product_attribut_id',$a->id)->update([
                'value'=>$this->attributValues[$key]
            ]);
        }
            }

             $this->updateMode=false;
    }

    public function destroyProduct($id){

        if ($id) {
            $record=Product::findOrFail($id);
            $imagePath=$record->image;
            Storage::disk('public')->delete("/" . $imagePath);
            $record->delete();
        }
    }

}
