@extends('admin.base')
@section('title', 'SaveBooks')

@section('content')

<div class="col-md-2 my-4  offset-10">
  <a class="btn-lg  bg-primary text-white  py-2 px-4 rounded" href="{{route('book.create')}}">Novo livro</a>
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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(count($books) > 0)
<div class="tab-content mt-4" id="orders-table-tab-content">
  <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
    <div class="app-card app-card-orders-table shadow-sm mb-5">
      <div class="app-card-body">
        <div class="table-responsive">
          <table class="table app-table-hover mb-0 text-left">
            <thead>
              <tr>
                <th class="cell">Título</th>
                <th class="cell">Autor</th>
                <th class="cell">Gênero</th>

                <th colspan="2" class="text-center">Ações</th>

              </tr>
            </thead>
            <tbody>
              @foreach($books as $book)
              <tr>
                <td class="cell">{{$book->title}}</td>
                <!-- <td class="cell">
                  {{ \Carbon\Carbon::parse($book->date_of_birth)->format('d/m/Y') }}

                  <span class="truncate"><span>
                </td> -->
                <td class="cell"> {{$book->author->full_name}}</td>


                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal{{$book->id}}">
                    Ver mais informações
                  </button>


                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">{{$book->title}}</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>{{$book->sinopse}}</p>

                          <img src="{{$book->cover}}" alt="" class="responsive m-auto mt-4" width="250">
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
                    <button type="button" class="btn btn-sm  btn-primary text-white" data-bs-toggle="modal" data-bs-target="#modalEditbook{{$book->id}}">
                      Editar
                    </button>
                    <div class="modal fade" id="modalEditbook{{$book->id}}" tabindex="-1" aria-labelledby="modalEditbookLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalEditbookLabel">Editar {{$book->title}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form class="settings-form" method="POST" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Titulo do livro</label>
                                <input type="text" name="title" class="form-control" id="setting-input-1" value="{{$book->title}}" required="">
                              </div>
                              <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Data de publicação</label>
                                <input type="date" name="published" class="form-control" id="published" required="" value="{{$book->published}}">
                              </div>
                              <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Autor</label>
                                <select name="author_id" id=""
                              
                                 class="form-control  {{ $errors->has('author_id') ? 'is-invalid' : '' }}">
                                  @foreach($authors as $author)
                                  <option value="{{$author->id}}"    @if($author->id == $book->author->id)
                                  selected
                                 @endif>{{$author->full_name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="gender" class="form-label">Gênero</label>
                                <input type="text" name="gender" class="form-control" id="gender" value="{{$book->gender}}">
                              </div>
                              <div class="mb-3">
                                <label for="biography" class="form-label">Sinopse</label>
                                <textarea name="sinopse" id="biography" class="form-control"> {{$book->sinopse}}
                                </textarea>
                              </div>
                              <div class="mb-3">
                                <input type="file" class="form-control" name="cover" value="{{$book->cover}}">
                              </div>
                              <button type="submit" class="btn app-btn-primary">Atualizar</button>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-danger text-white btn-sm" data-bs-toggle="modal" data-bs-target="#delbook{{$book->id}}">
                      Excluir
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="delbook{{$book->id}}" tabindex="-1" aria-labelledby="delbookLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="delbookLabel">Atenção!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Tem certeza que quer excluir o livro <b>{{$book->title}}?</b>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form class="settings-form" method="POST" action="{{ route('book.destroy', $book->id) }}">
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


  </div><!--//tab-pane-->



</div><!--//tab-content-->
@else

<div class="card">
  <p class="text-center text-secondary h6 py-4">Nenhum livro cadastrado.</p>

  @endif

</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection