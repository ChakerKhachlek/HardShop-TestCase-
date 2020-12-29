<div class="container">

    <div class="row">

      <div class="col-lg-12">

        <div class="row" style="margin-top:50px">
            @foreach($products as $p)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <img class="card-img-top" src="{{asset($p->image)}}" alt="">
              <div class="card-body">
                <h4 class="card-title">
                <div style="color:blue">{{$p->label}}</div>
                </h4>
                <h5>${{$p->price}}</h5>
                <p class="card-text">{{$p->description}}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">{{$p->subCategory->category->label}} : {{$p->subCategory->label}}
                <br>
                @foreach($p->attributsValues()->get() as $a)
                {{$a->attribut->name}} : {{$a->value}} <br>
                @endforeach
                </small>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>

