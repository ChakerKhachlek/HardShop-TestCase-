<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class CategoryComponent extends Component
{
     
    public $data, $label, $selected_id;

    //Update create mode variables switchers
    public $createMode=true;
    public $updateMode = false;

    //rendering component method
    public function render()
    {
        $this->data = Category::all();
        return view('livewire.admin.category.category-component');
    }

    //reseting inputs
    private function resetInput()
    {
        $this->label = null;
    }

    //creation mode on
    public function createMode(){
        $this->updateMode=false;
        $this->createMode=true;
    }

    //storing method 
    public function store()
    {
        $this->validate([
            'label' => 'required'
        ]);

        Category::create([
            'label' => $this->label
        ]);

        $this->resetInput();
    }

    //edit method
    public function edit($id)
    {
        $record = Category::findOrFail($id);
        $this->selected_id = $id;
        $this->label = $record->label;
        $this->updateMode = true;
    }

    //update method
    public function update()
    {
        $this->validate([
            'label' => 'required'
        ]);

        if ($this->selected_id) {
            $record = Category::find($this->selected_id);
            $record->update([
                'label' => $this->label
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }

    }

    //destroy method
    public function destroy($id)
    {
        if ($id) {
            $record = Category::where('id', $id);
            $record->delete();
        }
    }
}
