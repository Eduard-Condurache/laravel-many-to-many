@extends('layouts.app')

{{-- @section('page-title', $technology->name) --}}

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="mb-2">
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary">
                    Types
                </a>
            </div>
            <h2>
                Tipo di tecnologia
            </h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Nome: {{ $technology->name }}
                    </h5>
                    <h6>
                        Creato il: {{ $technology->created_at->format('d/m/Y') }}
                    </h6>
                    <h6>
                        Alle:  {{ $technology->created_at->format('H:i') }}
                    </h6>

                    <h6>
                        Progetti collegati:
                    </h6>
                    <ul>
                        @foreach($technology->projects as $project)
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