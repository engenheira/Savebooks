@extends('admin.base')
@section('title', 'SaveBooks')

@section('content')
@if(count($authors) > 0)
<h1 class="app-page-title">Novo livro</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-12 col-md-8">
    <div class="app-card app-card-settings shadow-sm p-4">

        <div class="app-card-body">
            <form class="settings-form" method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="setting-input-1" class="form-label">Título do livro
               </label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="setting-input-1" name="title" placeholder="1984"  value="{{old('title')}}">
                </div>
                <div class="mb-3">
                    <label for="setting-input-2" class="form-label">Autor</label>
                    <select name="author_id" id="" class="form-control  {{ $errors->has('author_id') ? 'is-invalid' : '' }}">
                        @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{$author->full_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label">Gênero</label>
                    <input type="text" class="form-control  {{ $errors->has('gender') ? 'is-invalid' : '' }}" id="setting-input-3" name="gender" placeholder="Teste" value="{{old('gender')}}">
                </div>
                <div class="mb-3">
                <label for="setting-input-3" class="form-label">Sinopse</label>
                    <textarea name="sinopse" id="" cols="30" rows="10" class="form-control  {{ $errors->has('sinopse') ? 'is-invalid' : '' }}">{{old('sinopse')}}</textarea>
                </div>
                <div class="mb-3">
                <label for="setting-input-3" class="form-label">Data de publicação</label>
                <input type="date" name="published" class="form-control  {{ $errors->has('published') ? 'is-invalid' : '' }}" value="{{old('published')}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Capa do livro</label>
                    <input type="file" class="form-control  {{ $errors->has('cover') ? 'is-invalid' : '' }}" name="cover" value="{{old('cover')}}">
                </div>
                <button type="submit" class="btn app-btn-primary">Cadastrar</button>
            </form>
        </div><!--//app-card-body-->

    </div><!--//app-card-->
</div>
@else 
<div class="card">
    <p class="text-secondary text-center h6 py-4">Para cadastrar um livro, tem que ter no mínimo um autor cadastrado.</p>
    <a href="{{url('admin/author/create')}}" class="btn-primary text-center pb-2"><b>Novo autor</b></a>
</div>
@endif
@endsection