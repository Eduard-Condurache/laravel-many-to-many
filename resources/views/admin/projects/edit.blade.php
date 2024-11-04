@extends('layouts.app')

@section('page-title', 'Projects')

@section('main-content')
    <div class="row">
        <div class="col">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.projects.update', ['project' => $project ->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label 
                                for="title" 
                                class="form-label">
                                <span class="text-danger">*</span>
                                Titolo</label>
                            <input 
                                type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                id="title" name="title"
                                value="{{ old('title', $project->title) }}"
                                minlength="3"
                                maxlength="64"
                                placeholder="Inserisci il titolo..." 
                                required>
                          </div>
        
                          <div class="mb-3">
                            <label 
                                for="description" 
                                class="form-label">
                                <span class="text-danger">*</span>
                                Descrizione</label>
                            <input 
                                type="text" 
                                class="form-control @error('description') is-invalid @enderror" 
                                id="description" 
                                name="description"
                                value="{{ old('description', $project->description) }}"
                                minlength="3"
                                maxlength="4096"
                                placeholder="Inserisci la descrizone" 
                                required>
                          </div>
        
                          <div class="mb-3">
                            <label 
                                for="image" 
                                class="form-label">Immagine</label>
                            <input 
                                type="file" 
                                class="form-control @error('image') is-invalid @enderror" 
                                id="image" 
                                name="image"
                                placeholder="Carica un immagine..">

                                @if ($project->image)
                                    <div class="mt-3"> 
                                        <h4>Preview Immagine:</h4>
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }} " class="preview-img">

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="remove_preview" name="remove_preview">
                                            <label class="form-check-label" for="remove_preview">
                                                Rimuovi preview
                                            </label>
                                          </div>
                                    </div>
                                @endif
                          </div>
        
                          <div class="mb-3">
                            <label 
                                for="category" 
                                class="form-label">
                                <span class="text-danger">*</span>
                                Categoria</label>
                            <input 
                                type="text" 
                                class="form-control @error('category') is-invalid @enderror" 
                                id="category" 
                                name="category"
                                value="{{ old('category', $project->category) }}"
                                minlength="2"
                                maxlength="64" 
                                placeholder="Inserisci la categoria">
                          </div>

                          <div class="mb-3">
                            <label 
                                for="type_id" 
                                class="form-label">
                                <span class="text-danger">*</span>
                                Tipologia</label>
                            <select 
                                id="type_id" 
                                name="type_id"
                                class="form-select">
                                <option
                                    @if(old('type_id', $project->type_id) == null)
                                        selected
                                    @endif 
                                    value="">Seleziona la tipologia</option>
                                @foreach ($types as $type)
                                    <option
                                        @if(old('type_id', $project->type_id) == $type->id)
                                            selected
                                        @endif  
                                        value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="form-label">Tecnologie</label>
                            @foreach($technologies as $technology)
                                <div class="form-check form-check-inline">
                                    <input
                                        @if($project->technologies->contains($technology->id))
                                          checked  
                                        @endif 
                                        class="form-check-input" 
                                        type="checkbox"
                                        name="technologies[]" 
                                        id="technology-{{ $technology->id  }}" 
                                        value="{{ $technology->id }}">
                                    <label 
                                        class="form-check-label" 
                                        for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                                </div>
                            @endforeach
                        </div>
        
                          <div>
                            <button type="submit" class="btn btn-success">
                                Modifica
                            </button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection