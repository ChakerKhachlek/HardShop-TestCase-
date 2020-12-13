<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use App\Models\SubCategory;
use Livewire\Component;

class ConfigurePcComponent extends Component
{
    
    public $motherBoardID;
    public $caseID;
    public $processorID;
    public $ramID;
    public $gpuID;
    public $hardDriveID;
    public $powerSupplyID;
    

    public $motherBoards ;
    public $selectedMotherBoard;

    public $cases;
    public $selectedCase;
    
    public $processors ;
    public $selectedProcessor;

    public $rams;
    public $selectedRam;
    public $possibleRamNumber=0;
    public $selectedRamNumber;

    public $gpus ;
    public $selectedGpu;

    public $hds ;
    public $selectedHd;

    public $pws ;
    public $selectedPw;
    
    public $selectedCaseInfo;

    public $buildMode=false;
    public $totalPrice=0;

    public function mount(){

        // Products SubCategoriesIds
        $this->motherBoardID=SubCategory::where('label','=','Mother Board')->first()->id;
        $this->processorID=SubCategory::where('label','=','Processor')->first()->id;
        $this->ramID=SubCategory::where('label','=','Ram')->first()->id;
        $this->gpuID=SubCategory::where('label','=','Graphic Card')->first()->id;
        $this->hardDriveID=SubCategory::where('label','=','Hard Drive')->first()->id;
        $this->powerSupplyID=SubCategory::where('label','=','Power Supply')->first()->id;
        $this->caseID=SubCategory::where('label','=','Case')->first()->id;

        //motherboards loaded once before component load
        $this->motherBoards=Product::where('sub_category_id','=',$this->motherBoardID)->get();
        $this->selectedMotherBoard=null;
        

        $this->resetInput();
    }

    public function render()
    {
        if((!empty($this->selectedProcessor)) && (!empty($this->selectedRamNumber)) &&(!empty($this->selectedRam))&& (!empty($this->selectedGpu)) && (!empty($this->selectedHd))){
            $this->pws=$this->compatiblePowerSupplys();
        }else{
            $this->pws=null;
        }
        
        return view('livewire.shop.configure-pc-component')
        ->layout('shop.layout.app')
        ->slot('main');
    }
    
    public function resetInput(){
        
        $this->selectedProcessor=null;
        $this->selectedRam=null;
        $this->selectedCase=null;
        $this->processors=null;
        $this->rams=null;
        $this->gpus=null;
        $this->hds=null;
        $this->pws=null;
        $this->cases=null;
        $this->possibleRamNumber=0;
    }

    public function compatibleProcessors(){
        
            return Product::where('sub_category_id','=',$this->processorID)->get()->filter(function ($proc){
            global $procSocketType;
            global $motherBoardSocketType;
            global $motherBoard;

            $motherBoard=Product::find($this->selectedMotherBoard);
            foreach($proc->attributsValues()->get() as $a)
            {
                if($a->attribut->name == 'Socket Type'){    
                    $procSocketType=$a->value;
                }
            }

            foreach($motherBoard->attributsValues()->get() as $m)
            {
                if($m->attribut->name == 'Socket Type'){    
                    $motherBoardSocketType=$m->value;
                }
            }

            if(strpos($procSocketType, $motherBoardSocketType) === false ){
                return false;
            }
            else{
                return true;
            }
            
        });
    }


    public function ramCalculator(){
        $motherBoard=Product::find($this->selectedMotherBoard);
        global $motherBoardSlotsNumber;
        global $motherBoardTotalRamCapacity;

        foreach($motherBoard->attributsValues()->get() as $m)
            {
                if($m->attribut->name == 'Ram Slots Number'){    
                    $motherBoardSlotsNumber=$m->value;
                }

                if($m->attribut->name == 'Total Ram Capacity'){    
                    $motherBoardTotalRamCapacity=$m->value;
                }
                
            }
            
        $ram=Product::find($this->selectedRam);
        global $ramCapacity;

        foreach($ram->attributsValues()->get() as $r)
            {
                if($r->attribut->name == 'Ram Capacity'){    
                    $ramCapacity=$r->value;
                }
            }
             
        $this->possibleRamNumber = 
        ($motherBoardTotalRamCapacity/$ramCapacity)>$motherBoardSlotsNumber?
        $motherBoardSlotsNumber:($motherBoardTotalRamCapacity/$ramCapacity);

    }


    public function compatibleGpus(){
        return Product::where('sub_category_id','=',$this->gpuID)->get()->filter(function ($gpu){
            global $gpuPCIType;
            global $motherBoardPCIType;
            global $motherBoard;

            $motherBoard=Product::find($this->selectedMotherBoard);
            foreach($gpu->attributsValues()->get() as $g)
            {
                if($g->attribut->name == 'PCI Type'){    
                    $gpuPCIType=$g->value;
                }
            }

            foreach($motherBoard->attributsValues()->get() as $m)
            {
                if($m->attribut->name == 'PCI Type'){    
                    $motherBoardPCIType=$m->value;
                }
            }

            if(($gpuPCIType >= $motherBoardPCIType) ){
                return true;
            }
            else{
                return false;
            }
            
        });
    }

    public function compatiblePowerSupplys(){
        return Product::where('sub_category_id','=',$this->powerSupplyID)->get()->filter(function ($ps){
            global $powerSupplyPower;
            
            global $hardDrivePower;
            //hard drives uses 10 watts
            $hardDrivePower=10;

            global $cpu;
            global $cpuPower;

            global $gpu;
            global $gpuPower;

            global $ram;
            global $ramPower;
            
            $cpu=Product::find($this->selectedProcessor);
            $gpu=Product::find($this->selectedGpu);
            $ram=Product::find($this->selectedRam);

            foreach($ps->attributsValues()->get() as $p)
            {
                if($p->attribut->name == 'Maximaum Power'){    
                    $powerSupplyPower=$p->value;
                }
            }

            foreach($cpu->attributsValues()->get() as $c)
            {
                if($c->attribut->name == 'TDP(MaximaumCpuPower)'){    
                    $cpuPower=$c->value;
                }
            }

            foreach($gpu->attributsValues()->get() as $g)
            {
                if($g->attribut->name == 'Power Consumption'){    
                    $gpuPower=$g->value;
                }
            }

            foreach($ram->attributsValues()->get() as $r)
            {
                if($r->attribut->name == 'Power Consumption'){    
                    $ramPower=$r->value;
                }
            }

            if( ($hardDrivePower+$cpuPower+$gpuPower+($ramPower*$this->selectedRamNumber)) <= $powerSupplyPower){
                return true;
            }
            else{
                return false;
            }
            
        });
    }

    public function compatibleCases(){
        return Product::where('sub_category_id','=',$this->caseID)->get()->filter(function ($case){
            
            global $caseHeight;
            global $caseWidth;

            global $motherBoard;
            global $mbHeight;
            global $mbWidth;

            $motherBoard=Product::find($this->selectedMotherBoard);
            

            foreach($case->attributsValues()->get() as $c)
            {
                if($c->attribut->name == 'Height'){    
                    $caseHeight=$c->value;
                }
            }

            foreach($case->attributsValues()->get() as $c)
            {
                if($c->attribut->name == 'Width'){    
                    $caseWidth=$c->value;
                }
            }

            foreach($motherBoard->attributsValues()->get() as $m)
            {
                if($m->attribut->name == 'Height'){    
                    $mbHeight=$m->value;
                }
            }

            foreach($motherBoard->attributsValues()->get() as $m)
            {
                if($m->attribut->name == 'Width'){    
                    $mbWidth=$m->value;
                }
            }
            
            if(($caseHeight > $mbHeight) || ($caseWidth > $mbWidth)){
                return true;
            }
            else{
                return false;
            }
            
        });
    }

    public function calculTotalPrice(){
        $mbpPrice=Product::find($this->selectedCase)->price;
        $pcuPrice=Product::find($this->selectedProcessor)->price;
        $ramPrice=Product::find($this->selectedRam)->price;
        $gpuPrice=Product::find($this->selectedGpu)->price;
        $hdPrice=Product::find($this->selectedHd)->price;
        $psPrice=Product::find($this->selectedPw)->price;
        $casePrice=Product::find($this->selectedCase)->price;
        
        $this->totalPrice= ($mbpPrice+$pcuPrice+($ramPrice*$this->selectedRamNumber)+$gpuPrice+$hdPrice+$psPrice+$casePrice);
        
    }
    

    public function updatedSelectedMotherBoard(){
        if(!empty($this->selectedMotherBoard)){
            $this->processors=$this->compatibleProcessors();
            $this->rams= Product::where('sub_category_id','=',$this->ramID)->get();
            if(!empty($this->selectedRam)){
                $this->ramCalculator();    
            }
           
            $this->gpus=$this->compatibleGpus();

            $this->hds= Product::where('sub_category_id','=',$this->hardDriveID)->get();
            
        }else{
            $this->resetInput();
        }
    }

    public function updatedSelectedRam(){
        if(!empty($this->selectedRam)){
            $this->ramCalculator();
            
        }
    }

    public function updatedSelectedPw(){
        if(!empty($this->selectedPw)){
            $this->cases=$this->compatibleCases();
            
        }else{
            $this->cases=null;
        }
    }

    public function updatedSelectedCase(){
        if(!empty($this->selectedCase) ){
            $this->selectedCaseInfo=Product::find($this->selectedCase);
            $this->buildMode=true;
        }
    }


}
