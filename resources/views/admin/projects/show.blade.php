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
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection