<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\ProductAttribut;
use App\Models\SubCategory;

class SubCategoryComponent extends Component
{
    public $attributName;
    public $label;
    public $subCategory;
    public $category;
    public $categories ;
    //for Category
    public $selectedId;
    //for SubCategory
    public $selected_id;

    public $selectedCategory;
    public $selectedSubCategory;
    public $subCategories=[];
    //Update create mode variables switchers
    public $createMode=false;
    public $updateMode=false;

    public $attributCreationMode=false;

    public $createButton=false;
   
    public function mount(){
      
    }

    public function render()
    {
        $this->categories=Category::orderBy('label')->get();

        if(!empty($this->category)) {
            $this->createButton=true;
            
            $this->subCategories = SubCategory::where('category_id', $this->category)->get()->sortBy('id');
                        }

        return view('livewire.admin.subCategory.sub-category-component');
    }

  

    //reset method
    public function resetInput(){
        $this->label=null;
    }

    //creation mode on
    public function createMode(){
        $this->resetInput();
        $this->selectedCategory=Category::find($this->category);
        $this->createMode=true;
    }


    //updating mode on 
    public function editMode($id){
        $record = SubCategory::findOrFail($id);
        $this->selected_id = $id;
        $this->label = $record->label;
        $this->selectedSubCategory=SubCategory::find($id);
        $this->createMode = false;
        $this->updateMode = true;
    }

    //store method
    public function store(){
        $this->validate([
            'label'=>'required',
        ]);
        
        $this->selectedCategory->subCategories()->create([
            'label' => $this->label,
        ]);

        $this->resetInput();
        $this->createMode=false;
    }

    //update method
    public function update(){
        $this->validate([
            'label'=>'required',
        ]);
        
        $record = SubCategory::findOrFail($this->selected_id);

     
        
        $record->update([
            'label' => $this->label,

        ]);

        $this->resetInput();
        $this->updateMode=false;
    }

    public function createSubCategory($id){
        $this->attributCreationMode=true;
        $this->selectedSubCategory=SubCategory::findOrFail($id);
    }

    public function storeAttributName(){
        $this->validate([
            'attributName'=>'required',
        ]);

        $this->selectedSubCategory->attributs()->create([
            'name' => $this->attributName,
        ]);
        $this->attributCreationMode=false;
    }

    public function destroyAttribut($id){

        if ($id) {
             $record = ProductAttribut::find($id);
             $record->attributValues()->delete();
             $record->delete();
         }
    }

     //destroy method
     public function destroySubCategory($id)
     {
         if ($id) {
             $record = SubCategory::where('id', $id);
             
             $record->delete();
         }
     }
    
   
}
