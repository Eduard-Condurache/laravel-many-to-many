@extends('layouts.app')

@section('page-title', 'Projects')

@section('main-content')
    <div class="row">
        <div class="col">
          <div class="my-3">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
              + Aggiungi progetto
            </a>
          </div>
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Tipologia Progetto</th>
                    <th scope="col">Tecnologie</th>
                    <th scope="col">VEDI</th>
                    <th scope="col">MODIFICA</th>
                    <th scope="col">ELIMINA</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($projects as $project)
                  <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->category }}</td>
                    <td>
                      @if ($project->type != null)
                        <a href="{{ route('admin.types.show', ['type' => $project->type_id]) }}">
                          {{ $project->type->name }}
                        </a>
                      @else
                        -
                      @endif    
                    </td>
                    <td>
                      @foreach ($project->technologies as $technology)
                        <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge text-bg-success">
                          {{ $technology->name }}
                        </a>
                      @endforeach
                    </td>
                    <td>
                      <a href="{{ route('admin.projects.show',['project' => $project->id]) }}" class="btn btn-primary">
                        VEDI
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('admin.projects.edit',['project' => $project->id]) }}" class="btn btn-secondary">
                        Modifica
                      </a>
                    </td>
                    <td>
                      <form
                        onsubmit="return confirm('Sei sicuro di voler cancellare il progetto?')" 
                        action="{{ route('admin.projects.destroy',['project' => $project->id]) }}" 
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