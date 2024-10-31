@extends('layouts.app')

@section('page-title', 'Crea il tipo')

@section('main-content')
    <div class="row">
        <div class="col">

          <div class="d-flex align-items-center justify-content-between">
            <h1 class="my-3">
                Crea un nuova tipologia di progetto
            </h1>
            <a href="{{ route('admin.types.index') }}" class="btn btn-primary">
                Torna alla pagina principale
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
                <form action="{{ route('admin.types.store') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                      <label 
                          for="name" 
                          class="form-label">
                          <span class="text-danger">*</span>
                          Nome</label>
                      <input 
                          type="text" 
                          class="form-control @error('name') is-invalid @enderror" 
                          id="name" name="name"
                          value="{{ old('name') }}"
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