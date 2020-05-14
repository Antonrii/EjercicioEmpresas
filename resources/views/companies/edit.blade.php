@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Editar Compañia
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
            <p>Sitio Web o Email ya existe</p>
          </div>
          @endif

          <form action="{{ route('companies.update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" placeholder="Nombre" value=" {{ $company->name }} " required>
            </div>

            <div class="form-group">
              <label for="address">Direccion</label>
              <input type="text" class="form-control" name="address" placeholder="Direccion" value=" {{ $company->address }} " required>
            </div>

            <div class="form-group">
              <label for="website">Pagina Web</label>
              <input type="url" class="form-control" name="website" placeholder="Pagina Web" value=" {{ $company->website }} " required>
            </div>

            <div class="form-group">
              <label for="email">Correo Electronico</label>
              <input type="email" class="form-control" name="email" placeholder="Correo Electronico" value=" {{ $company->email }} " required>
            </div>

            <button type="submit" class="btn btn-success float-right">Actualizar</button>

          </form>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection