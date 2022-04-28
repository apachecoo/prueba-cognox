@extends('layouts.app')

@section('content')
<div class="container">
  

 
  <div class="my-3 p-3 bg-white rounded box-shadow">
    <h1 class="border-bottom border-gray pb-2 mb-0">Transferencias Bancarias</h1>

    @if (count($banksTransactions)>0)
    


    @foreach ($banksTransactions as $banksTransaction)
    <div class="media text-muted pt-3">
      
      
      
      
        
        <h3 class="mb-0">
          <a class="text-primary" href="#">Transacción Número: {{$banksTransaction->id}}</a>
        </h3>
        <div class="mb-1 text-muted"><strong>Fecha Transacción:</strong> {{$banksTransaction->added_at}}</div>
        <div class="mb-1 text-muted"><strong>Cuenta origen: </strong>{{$banksTransaction->root_account}}</div>
        <div class="mb-1 text-muted"><strong>Cuenta destino:</strong> {{$banksTransaction->destination_account}}</div>
        <div class="mb-1 text-muted"><strong>Monto:</strong> {{$banksTransaction->amount}}</div>
      
    </div>
    @endforeach
    
    
  </div>
  {{ $banksTransactions->links('pagination::bootstrap-4') }}
  </div>
    @else
      <div class="alert alert-warning" role="alert">
        No hay datos de transferencias
      </div>
    @endif
    
  
  @endsection

  