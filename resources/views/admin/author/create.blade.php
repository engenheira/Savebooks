@extends('admin.base')
@section('title', 'SaveBooks')

@section('content')
<h1 class="app-page-title">Novo autor</h1>
<div class="col-12 col-md-8">
    <div class="app-card app-card-settings shadow-sm p-4">

        <div class="app-card-body">
            <form class="settings-form" method="POST" action="{{route('author.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="setting-input-1" class="form-label">Nome completo</label>
                    <input type="text" name="full_name" class="form-control" id="setting-input-1" placeholder="Machado de Assis" required="">
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Data de nascimento</label>
                    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" required="">
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">País</label>
                    <input type="text" name="country" class="form-control" id="country" placeholder="Brasil">
                </div>
                <div class="mb-3">
                    <label for="biography" class="form-label">Biografia</label>
                    <textarea name="biography" id="biography" cols="30" rows="50"class="form-control"></textarea>
                </div>
                <button type="submit" class="btn app-btn-primary">Cadastrar</button>
            </form>
        </div><!--//app-card-body-->

    </div><!--//app-card-->
</div>
@endsection