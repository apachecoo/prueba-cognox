@extends('layouts.app')

@section('content')
<div class="container">
  

 
  <div class="my-3 p-3 bg-white rounded box-shadow">
    <h1 class="border-bottom border-gray pb-2 mb-0">Estado de cuentas </h1>

    @if (count($ownAccounts)>0)
    


    @foreach ($ownAccounts as $ownAccount)
    <div class="media text-muted pt-3">
      
      
      
      
        
        <h3 class="mb-0">
          <a class="text-primary" href="#">Número de cuenta: {{$ownAccount->account_number}}</a>
        </h3>
        <div class="mb-1 text-muted"><strong>Saldo:</strong> {{$ownAccount->balance}}</div>
        <div class="mb-1 text-muted"><strong>Estado: </strong>@if($ownAccount->active==1) <span class="text-success">Activa</span>@else <span class="text-danger">Inactiva</span> @endif</div>
        
        
      
    </div>
    @endforeach
    
    
  </div>
  
  </div>
    @else
      <div class="alert alert-warning" role="alert">
        No hay datos de transferencias
      </div>
    @endif
    
  
  @endsection

  