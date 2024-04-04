@extends('admin.base')
@section('title', 'SaveBooks')

@section('content')

<div class="col-md-2 my-4  offset-10">
  <a class="btn-lg  bg-primary text-white  py-2 px-4 rounded" href="{{route('author.create')}}">Novo autor</a>
</div>
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
@if(session('warning'))
<div class="alert alert-warning">
  {{ session('warning') }}
</div>
@endif

@if(count($authors) > 0)
<div class="tab-content mt-4" id="orders-table-tab-content">
  <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
    <div class="app-card app-card-orders-table shadow-sm mb-5">
      <div class="app-card-body">
        <div class="table-responsive">
          <table class="table app-table-hover mb-0 text-left">
            <thead>
              <tr>
                <th class="cell">Nome</th>
                <th class="cell">Data de Nascimento</th>
                <th class="cell">País</th>
                <th class="cell">Biografia</th>
                <th colspan="2" class="text-center">Ações</th>

              </tr>
            </thead>
            <tbody>
              @foreach($authors as $author)
              <tr>
                <td class="cell">{{$author->full_name}}</td>
                <td class="cell">
                  {{ \Carbon\Carbon::parse($author->date_of_birth)->format('d/m/Y') }}

                  <span class="truncate"><span>
                </td>
                <td class="cell"> {{$author->country}}</td>


                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ver biografia
                  </button>


                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">{{$author->full_name}}</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          {{$author->biography}}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="cell">
                  <div class="d-flex justify-content-evenly">
                  <button type="button" class="btn btn-sm  btn-primary text-white" data-bs-toggle="modal" data-bs-target="#modalEditAuthor">
                    Editar
                  </button>
                  <div class="modal fade" id="modalEditAuthor" tabindex="-1" aria-labelledby="modalEditAuthorLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="modalEditAuthorLabel">Editar {{$author->full_name}}</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="settings-form" method="POST" action="{{ route('author.update', $author->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                              <label for="setting-input-1" class="form-label">Nome completo</label>
                              <input type="text" name="full_name" class="form-control" id="setting-input-1" value="{{$author->full_name}}" required="">
                            </div>
                            <div class="mb-3">
                              <label for="date_of_birth" class="form-label">Data de nascimento</label>
                              <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" required="" value="{{$author->date_of_birth}}">
                            </div>
                            <div class="mb-3">
                              <label for="country" class="form-label">País</label>
                              <input type="text" name="country" class="form-control" id="country" value="{{$author->country}}">
                            </div>
                            <div class="mb-3">
                              <label for="biography" class="form-label">Biografia</label>
                              <textarea name="biography" id="biography" class="form-control"> {{$author->biography}}
                              </textarea>
                            </div>
                            <button type="submit" class="btn app-btn-primary">Atualizar</button>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn  btn-danger text-white btn-sm" data-bs-toggle="modal" data-bs-target="#delAuthor">
                    Excluir
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="delAuthor" tabindex="-1" aria-labelledby="delAuthorLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="delAuthorLabel">Atenção!</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Tem certeza que quer excluir o autor <b>{{$author->full_name}}?</b>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <form class="settings-form" method="POST" action="{{ route('author.destroy', $author->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Sim, excluir</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </td>
            
              </tr>
              @endforeach


            </tbody>
          </table>
        </div><!--//table-responsive-->

      </div><!--//app-card-body-->
    </div><!--//app-card-->
    <nav class="app-pagination">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav><!--//app-pagination-->

  </div><!--//tab-pane-->



</div><!--//tab-content-->
@else

<div class="card">
  <p class="text-center text-secondary h6 py-4">Nenhum autor cadastrado.</p>

  @endif

</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection