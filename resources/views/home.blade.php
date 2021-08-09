@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="row p-3">
                    <div class="col-sm-10 mx-auto">
                        <div class="card border-0 shadow">
                            <div class="card-header">
                                <h3 class="card-title mt-2">Pedir servicio</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('services.store') }}" method="POST">
                                    <div class="col-sm-12 mb-2">
                                        <label for="origen" class="form-label">Ubicación origen</label>
                                        <input type="text" id="origen" name="origen" class="form-control" value="{{ old('ubicacion_origen') }}">
                                    </div>
                                    <div class="col-sm-12 mb-2">
                                        <label for="destino" class="form-label">Ubicación destino</label>
                                        <input type="text" id="destino" name="destino" class="form-control" value="{{ old('ubicacion_destino') }}">
                                    </div>
                                    <div class="col-sm-12 mb-2">
                                        <label for="oferta" class="form-label">$Oferta</label>
                                        <input type="number" id="oferta" name="oferta" class="form-control" value="{{ old('oferta') }}">
                                    </div>
                                    <div class="col-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Solicitar servicio</button>
                                    </div>    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row m-3">
                    <h3 class="col-sm-12">Mis servicios solicitados:</h3>
                    @foreach($misServicios as $service)
                    <div class="col-sm-12 col-md-6">
                        <div class="card border-0 shadow mb-3">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2"><span class="text-primary">Ubicación de origen: </span>{{ $service->ubicacion_origen }}</h6>
                                <h6 class="card-subtitle mb-2"><span class="text-primary">Ubicación de destino: </span>{{ $service->ubicacion_destino }}</h6>
                                <h6 class="card-subtitle mb-2"><span class="text-primary">Oferta: </span>{{ $service->oferta }}</h6>                              
                            </div>
                            <div class="card-footer text-muted">
                                <p>Conductor:@if(isset($service->driver_name)) {{ $service->driver_name }} @else En espera de confirmación @endif</p>
                            </div>    
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
