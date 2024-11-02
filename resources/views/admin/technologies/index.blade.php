@extends('layouts.app')

@section('page-title', 'Technologies')

@section('main-content')
    <div class="row">
        <div class="col">
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col"># Tecnologie collegate</th>
                    <th scope="col">VEDI</th>
                    <th scope="col">ELIMINA</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($technologies as $technology)
                  <tr>
                    <th scope="row">{{ $technology->id }}</th>
                    <td>{{ $technology->name }}</td>
                    <td>{{ count($technology->projects) }}</td>
                    <td>
                      <a href="{{ route('admin.technologies.show',['technology' => $technology->id]) }}" class="btn btn-primary">
                        VEDI
                      </a>
                    </td>
                    <td>
                      <form
                        onsubmit="return confirm('Sei sicuro di voler cancellare questa tecnologia?')" 
                        action="{{ route('admin.technologies.destroy',['technology' => $technology->id]) }}" 
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