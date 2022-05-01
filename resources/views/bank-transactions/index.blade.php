@extends('layouts.app')

@section('content')
<div class="container">

<div class="row justify-content-around align-items-center ">
      <div class="col-md-3 text-center  "  >

      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('images/cuentas-propias.webp')}}" alt="Card image cap" >
        <div class="card-body">
            <h5 class="card-title">Cuentas propias</h5>

            <a href="{{ route('transfer-own-account.index') }}" class="btn btn-primary">Transferir</a>
        </div>
      </div>

      </div>
      <div class="col-md-4 text-center "  >

      <div class="card mb-3" style="width: 18rem; ">
        <img class="card-img-top" src="{{asset('images/cuentas-propias.webp')}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Cuentas terceros</h5>

            <a href="{{route('transfer-other-account.index')}}" class="btn btn-primary">Transferir</a>
        </div>
      </div>

      </div>
    </div>

</div>
@endsection
