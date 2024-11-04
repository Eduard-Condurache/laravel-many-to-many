@extends('layouts.app')

@section('page-title', 'Projects')

@section('main-content')
    <div class="row">
        <div class="col">

          <div class="d-flex align-items-center justify-content-between">
            <h1 class="my-3">
                Crea un nuovo progetto
            </h1>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                Torna ai progetti
            </a>
        </div>

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
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
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
                          value="{{ old('title') }}"
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
                          value="{{ old('description') }}"
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
                    </div>
  
                    <div class="mb-3">
                      <label 
                          for="category" 
                          class="form-label">
                          <span class="text-danger">*</span>
                          Categoria</label>
                      <input 
                          type="text" 
                          class="form-control" 
                          id="category" 
                          name="category"
                          value="{{ old('category') }}"
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
                                @if(old('type_id') == null)
                                    selected
                                @endif 
                                value="">Seleziona la tipologia</option>
                            @foreach ($types as $type)
                                <option
                                    @if(old('type_id') == $type->id)
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
                          Aggiungi
                      </button>
                    </div>
              </form>
              </div>
            </div>
        </div>
    </div>
@endsection