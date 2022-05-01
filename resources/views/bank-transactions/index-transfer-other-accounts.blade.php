@extends('layouts.app')

@section('content')
<div class="container">
  <div class="my-3 p-3 bg-white rounded box-shadow">
    @if(session("tipo")=='exitoso')
    <div class="alert alert-success" role="alert">
      {{session("mensaje")}}
  </div>
@endif
    
    <h1 class="border-bottom border-gray pb-2 mb-0">Transferir a otras cuentas</h1>

    <form class="p-3" method="post" action="{{ route('transfer-own-account.create') }}">
      @csrf

      {{-- <div class="row mb-3">
        <div class="col-md-6 ">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>
      </div> --}}

      <div class="row mb-3">
        <label for="root_account" class="col-md-4 col-form-label text-md-end">Cuenta origen</label>
        <div class="col-md-6">

          <select class="form-select @error('root_account') is-invalid @enderror" id="root_account" name="root_account">
            <option disabled selected>Seleccione cuenta origen</option>
            @foreach ($ownAccounts as $ownAccount)

            @if (old('root_account') == $ownAccount->account_number )
                  <option value="{{ $ownAccount->account_number }}" selected>{{ $ownAccount->account_number }}</option>
            @else
                  <option value="{{ $ownAccount->account_number}}">{{ $ownAccount->account_number}} - {{ $ownAccount->names }}
              {{ $ownAccount->surnames }}</option>
            @endif
            
            @endforeach
          </select>
          @error('root_account')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="row mb-3">
        <label for="destination_account" class="col-md-4 col-form-label text-md-end">Cuenta destino</label>
        <div class="col-md-6">
          <select class="form-select @error('destination_account') is-invalid @enderror" id="destination_account" name="destination_account">
            <option disabled selected>Selecciona cuenta destino</option>
            @foreach ($ownAccounts as $ownAccount)
            @if (old('destination_account') == $ownAccount->account_number )
                  <option value="{{ $ownAccount->account_number }}" selected>{{ $ownAccount->account_number }}</option>
            @else
                  <option value="{{ $ownAccount->account_number}}">{{ $ownAccount->account_number}} - {{ $ownAccount->names }}
              {{ $ownAccount->surnames }}</option>
            @endif
            @endforeach
          </select>

          @error('destination_account')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="row mb-3">
        <label for="identification_document" class="col-md-4 col-form-label text-md-end">valor</label>
        <div class="col-md-6">
          <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{old('amount')}}" 
            autofocus="">
            @error('amount')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
      </div>


      <hr class="mb-4">
      <div class="row">
        <div class="col align-self-end">
          <button class="btn btn-primary btn-lg btn-blockfloat-right" type="submit">Transferir</button>
        </div>
      </div>

      
    </form>

  </div>
  @endsection