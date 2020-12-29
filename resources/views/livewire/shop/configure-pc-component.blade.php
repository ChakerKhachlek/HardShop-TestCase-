<div class="container" >
    <h3 style="margin-top:20px">Build Your Own PC</h3>
<div class="row">
    
    <div class="col-lg-8">

    <div class="mb-8" style="margin-top:20px">
        <label class="inline-block w-32 font-bold">MotherBoard :</label>
        {{-- motherBoard model  Livewire--}}
        <select name="" wire:model="selectedMotherBoard" class="border shadow p-2 bg-white">
            <option value=''>Choose a MotherBoard</option>
            {{-- selecting motherBoard Livewire--}}
            @foreach($motherBoards as $m)
                <option value={{ $m->id }}>{{$m->label}} ( {{$m->price}} dt )</option>
            @endforeach
        </select>
    </div>

    @if(!is_null($processors))
    <div class="mb-8" style="margin-top:20px">
        <label class="inline-block w-32 font-bold">Processor :</label>
        {{-- Processor model  Livewire--}}
        <select name="" wire:model="selectedProcessor" class="border shadow p-2 bg-white">
            <option value=''>Choose a Processor</option>
            {{-- selecting Processor Livewire--}}
            @foreach($processors as $p)
                <option value={{ $p->id }}>{{$p->label}} ( {{$p->price}} dt )</option>
            @endforeach
        </select>
    </div>
    @endif

    @if(!is_null($rams))
    <div class="mb-8" style="margin-top:20px">
        <label class="inline-block w-32 font-bold">Ram :</label>

        {{-- Ram model  Livewire--}}
        <select name="" wire:model="selectedRam" class="border shadow p-2 bg-white">
            <option value=''>Choose a Ram</option>
            {{-- selecting Ram Livewire--}}
            @foreach($rams as $r)
                <option value={{ $r->id }}>{{$r->label}} ( {{$r->price}} dt )</option>
            @endforeach
        </select>

        @if(!is_null($selectedRam))
        <select wire:model="selectedRamNumber" name="" class="border shadow p-2 bg-white">
            <option value=''  selected>Choose Number</option>
            {{-- selecting Ram Livewire--}}
            @for($i = 1; $i <= $possibleRamNumber ; $i++)
                <option value={{$i}}>{{$i}}</option>
            @endfor
        </select>
        @endif

    </div>
    @endif

    @if(!is_null($gpus))
    <div class="mb-8" style="margin-top:20px">
        <label class="inline-block w-32 font-bold">Graphic Card :</label>
        {{-- Gpu model  Livewire--}}
        <select name="" wire:model="selectedGpu" class="border shadow p-2 bg-white">
            <option value=''>Choose a Graphic Card</option>
            {{-- selecting Gpu Livewire--}}
            @foreach($gpus as $g)
                <option value={{ $g->id }}>{{$g->label}} ( {{$g->price}} dt )</option>
            @endforeach
        </select>
    </div>
    @endif

    @if(!is_null($hds))
    <div class="mb-8" style="margin-top:20px">
        <label class="inline-block w-32 font-bold">Hard Drive :</label>
        {{-- hd model  Livewire--}}
        <select name="" wire:model="selectedHd" class="border shadow p-2 bg-white">
            <option value=''>Choose a Hard Drive</option>
            {{-- selecting hd Livewire--}}
            @foreach($hds as $h)
                <option value={{ $h->id }}>{{$h->label}} ( {{$h->price}} dt )</option>
            @endforeach
        </select>
    </div>
    @endif

    @if(!is_null($pws))
    <div class="mb-8" style="margin-top:20px">
        <label class="inline-block w-32 font-bold">Power Supply :</label>
        {{-- pw model  Livewire--}}
        <select name="" wire:model="selectedPw" class="border shadow p-2 bg-white">
            <option value=''>Choose a Power Supply</option>
            {{-- selecting pw Livewire--}}
            @foreach($pws as $p)
                <option value={{ $p->id }}>{{$p->label}} ( {{$p->price}} dt )</option>
            @endforeach
        </select>
    </div>
    @endif

    @if(!is_null($cases))
    <div class="mb-8" style="margin-top:20px ">
        <label class="inline-block w-32 font-bold">Case :</label>
        {{-- Case model  Livewire--}}
        <select name="" wire:model="selectedCase" class="border shadow p-2 bg-white">
            <option value=''>Choose a Case</option>
            {{-- selecting Case Livewire--}}
            @foreach($cases as $s)
                <option value={{ $s->id }}>{{$s->label}} ( {{$s->price}} dt )</option>
            @endforeach
        </select>
    </div>
    @endif
</div> 

<div class="col-lg-4 " >
   
        

    @if(!empty($selectedCase))
     <img class="card-img-top" src="{{asset($selectedCaseInfo->image)}}" alt="">  
    @endif
    
 
    @if($buildMode)
    
    <button  wire:click="calculTotalPrice" class="btn btn-primary btn-block" style="margin-top:5px" >Buy</button>
   
             @if($totalPrice != 0)
             <script>
             alert('Total Price ='+{{$totalPrice}});
            </script>
             @endif
    @endif

</div>



</div>
</div>
