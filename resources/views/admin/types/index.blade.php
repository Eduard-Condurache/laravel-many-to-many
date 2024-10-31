@extends('layouts.app')

@section('page-title', 'Types')

@section('main-content')
    <div class="row">
        <div class="col">
          <div class="my-3">
            <a href="{{ route('admin.types.create') }}" class="btn btn-primary">
              + Aggiungi tipo di progetto
            </a>
          </div>
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col"># Tipologie collegate</th>
                    <th scope="col">VEDI</th>
                    <th scope="col">MODIFICA</th>
                    <th scope="col">ELIMINA</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($types as $type)
                  <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->description }}</td>
                    <td>{{ count($type->projects) }}</td>
                    <td>
                      <a href="{{ route('admin.types.show',['type' => $type->id]) }}" class="btn btn-primary">
                        VEDI
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('admin.types.edit',['type' => $type->id]) }}" class="btn btn-secondary">
                        Modifica
                      </a>
                    </td>
                    <td>
                      <form
                        onsubmit="return confirm('Sei sicuro di voler cancellare questa tipologia?')" 
                        action="{{ route('admin.types.destroy',['type' => $type->id]) }}" 
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                          Elimina
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection