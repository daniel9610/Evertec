
@extends('layouts.app')
@section('content')

    <section class="vh-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-10 col-lg-8 col-xl-6">
        <div class="card card-stepper" style="border-radius: 16px;">
          <div class="card-header p-4">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <p class="text-muted mb-0"> Fecha de compra <span class="fw-bold text-body">{{ date("Y-m-d H:i:s") }}</span> </p>
              </div>
              <div>
                <h6 class="mb-0"> <a href="{{ route('welcome')}}">X</a> </h6>
              </div>
            </div>
          </div>
          <div class="card-body p-4">
            <div class="d-flex flex-row mb-4 pb-2">
              <div class="flex-fill">
                <h5 class="bold">{{$item[0]->name}}</h5>
                <p class="text-muted"> Descripción: {{ $item[0]->description }}</p>
                <h4 class="mb-3"> $ {{ $item[0]->price }} <span class="small text-muted"> via (COP) </span></h4>
                <p class="text-muted">Estado de seguimiento a las: <span class="text-body">{{ date("H:i:s") }}, Hoy</span></p>
              </div>
              <div>
                <img class="align-self-center"
                  src="{{ $item[0]->picture->location }}" width="250" height="250">
              </div>
            </div>
            <ul id="progressbar-1" class="mx-0 mt-0 mb-5 px-0 pt-0 pb-4">
              <li class="step0 active" id="step1"><span
                  style="margin-left: 22px; margin-top: 12px;">CREAR ORDEN</span></li>
              <li class="step0 active text-center" id="step2"><span>CONFIRMAR</span></li>
              <li class="step0 text-muted text-end" id="step3"><span
                  style="margin-right: 22px;">PAGAR</span></li>
            </ul>
          </div>
          <div class="card-footer p-4">
            <div class="d-flex justify-content-center">

            <form id="pay-form" action="{{ route('redirect-to-pay') }}" method="POST">
            <input id="customer_id" name="customer_id" value="{{ $user->id }}" hidden>
            <input id="item_id" name="item_id" value="{{ $item[0]->id }}" hidden>
            <input id="total_price" name="total_price" value="{{ $item[0]->price }}" hidden>
            <input id="item_description" name="item_description" value="{{ $item[0]->description }}" hidden>
            <h5 class="fw-normal mb-0" style="padding-right: 30px;"><input type="submit" >Pagar</a></h5>

            @csrf
            </form>
          
              <h5 class="fw-normal mb-0"><a href="#!">Cancelar</a></h5>
              <div class="border-start h-100"></div>
              <h5 class="fw-normal mb-0"><a href="#!" class="text-muted"><i class="fas fa-ellipsis-v"></i></a>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- </body> -->
@endsection
