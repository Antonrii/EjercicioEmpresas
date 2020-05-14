@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Crear Compañia
          <a class="btn btn-success btn-sm float-right" href="{{ route('companies.index') }}">Atras</a>
        </div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <p>Pagina web o Email ya existe</p>
          </div>
          @endif

          <form action="{{ route('companies.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" placeholder="Nombre">
            </div>

            <div class="form-group">
              <label for="address">Direccion</label>
              <input type="text" class="form-control" name="address" placeholder="Direccion">
            </div>

            <div class="form-group">
              <label for="website">Pagina Web</label>
              <input type="text" class="form-control" name="website" placeholder="Pagina Web">
            </div>

            <div class="form-group">
              <label for="email">Correo Electronico</label>
              <input type="email" class="form-control" name="email" placeholder="Correo Electronico">
            </div>

            <button type="submit" class="btn btn-success float-right">Crear</button>

          </form>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection