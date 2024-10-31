@extends('layouts.app')

@section('page-title', $type->name)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="mb-2">
                <a href="{{ route('admin.types.index') }}" class="btn btn-primary">
                    Types
                </a>
            </div>
            <h2>
                Tipo di progetto
            </h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Nome: {{ $type->name }}
                    </h5>
                    <p>
                        Descrizione: {{ $type->description }}
                    </p>
                    <h6>
                        Creato il: {{ $type->created_at->format('d/m/Y') }}
                    </h6>
                    <h6>
                        Alle:  {{ $type->created_at->format('H:i') }}
                    </h6>

                    <h6>
                        Progetti collegati:
                    </h6>
                    <ul>
                        @foreach($type->projects as $project)
                        <li>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ $project->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection