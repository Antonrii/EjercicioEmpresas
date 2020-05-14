  @extends('layouts.app')

  @section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        @if ($message = Session::get('creada'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif

        @if ($message = Session::get('eliminada'))
        <div class="alert alert-danger">
          <p>{{ $message }}</p>
        </div>
        @endif

        <div class="card">
          <div class="card-header">Panel de control
            <a class="btn btn-success btn-sm float-right" href="{{ route('companies.create') }}">Crear nueva compañia</a>
          </div>
          <div class="card-body">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif

            <table class="table table-sm">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Pagina Web</th>
                  <th scope="col">Correo Electronico</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($companies as $company)
                <tr>

                  <th scope="row">{{ $company->id }}</th>
                  <th>{{ $company->name }}</th>
                  <td>{{ $company->address }}</td>
                  <td>{{ $company->website }}</td>
                  <td>{{ $company->email }}</td>
                  <td>
                    <a class="btn btn-light btn-sm" href="{{ route('companies.edit', $company->id) }}">Editar</a>
                    <form action=" {{ route('companies.destroy', $company->id) }} " method="POST">
                      @csrf
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="btn btn-danger btn-sm">Borrar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection