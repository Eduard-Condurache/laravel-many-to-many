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

                            @if(isset($project->type))
                            <a href="{{ route('admin.types.show', ['type' => $project->type->id]) }}">
                                 {{ $project->type->name }}
                            </a>
                            @else
                                -
                            @endif
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

                    <div>
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }} " class="card-img-bottom">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection