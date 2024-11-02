@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <h2>
                Progetto
            </h2>
            <div class="card">
                <div class="card-body">

                    <h4>
                        Titolo: {{ $project->title }}
                    </h4>

                    <ul>
                        <li>
                            Descrizione: {{ $project->description }}
                        </li>
                        <li>
                            Tipo di progetto collegato:
                            <a href="{{ route('admin.types.show', ['type' => $project->type->id]) }}">
                                 {{ $project->type->name }}
                            </a>
                        </li>
                        <li>
                            Tecnologie:
                            @foreach ($project->technologies as $technology)
                                <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge text-bg-success">
                                    {{ $technology->name }}
                                </a>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection