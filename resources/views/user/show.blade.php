@extends('panel.base')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          @include('alerts')
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <strong>Nome: </strong> {{ $user->name }} <br>
              <strong>Contato: </strong> {{ $user->contato }} <br>
              <strong>E-mail: </strong> {{ $user->email }} <br>
              <strong>Data cadastro: </strong> {{ $user->created_at }} <br>
              <strong>Permissão: </strong>
              @if ( $user->role == 'user' )
                <td> <span class="badge badge-secondary"> Normal </span></td>
              @elseif( $user->role == 'admin' )
                <td> <span class="badge badge-success"> Admin </span></td>
              @else
                <td> <span class="badge badge-warning"> Editor </span></td>
              @endif
              <a class="btn btn-sm btn-round btn-icon btn-info" data-toggle="modal" data-target="#exampleModal" title="Mudar permissão" role="button"><i class="fas fa-info-circle"></i> </a>    
            </div>
        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>

      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mudar permissão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action=" {{ route('update-usuario') }} " method="post">
                        @csrf
                        <div class="form-group">
                            <label>Deseja mudar a função?</label>
                            <div class="form-check form-check-inline">
                                @if ($user->role == 'user')
                                    <input class="form-check-input" name="role" type="radio"  value="user" checked>
                                @else
                                    <input class="form-check-input" name="role" type="radio"  value="user">
                                @endif
                                <label class="form-check-label">Normal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                @if ($user->role == 'admin')
                                    <input class="form-check-input" name="role" type="radio"  value="user" checked>     
                                @else
                                    <input class="form-check-input" name="role" type="radio"  value="admin">
                                @endif
                                <label class="form-check-label">Admin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                @if ($user->role == 'editor')
                                    <input class="form-check-input" name="role" type="radio"  value="editor" checked>     
                                @else
                                    <input class="form-check-input" name="role" type="radio"  value="editor">
                                @endif
                                <label class="form-check-label">Editor</label>
                            </div>
                        </div>
                        <input type="text" name="id"  value=" {{ $user->id }} " hidden>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
                </div>
            </div>
        </div>
    </div>

      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection