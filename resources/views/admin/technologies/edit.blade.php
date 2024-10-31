@extends('layouts.app')

@section('page-title', 'Modifica '.$technology->name)

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
                    <form action="{{ route('admin.technologies.update', ['technology' => $technology ->id]) }}" method="POST">
                        @method('PUT')
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
                                id="name" 
                                name="name"
                                value="{{ old('name', $technology->name) }}"
                                minlength="3"
                                maxlength="64"
                                placeholder="Inserisci il Nome..." 
                                required>
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