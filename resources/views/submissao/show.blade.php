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
          <h3 class="card-title"> <b>{{ $submissao->titulo }}</b></h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <strong>Status: </strong>
                @if ($submissao->status == 'pendente')
                  <span class="badge badge-info"> Pendente </span>
                @elseif($submissao->status == 'aprovado')
                  <span class="badge badge-success"> Aprovado </span>
                @elseif($submissao->status == 'reprovado')
                  <span class="badge badge-danger"> Reprovado </span>
                @else
                  <span class="badge badge-warning"> Correção </span>  
                @endif
                <br> <hr class="my-1">
              <strong>Remetente: </strong> {{ $submissao->user->name }} <br>
              <hr class="my-1">
              <strong>E-mail: </strong> {{ $submissao->user->email }} <br>
              <hr class="my-1">
              <strong>Contato: </strong> {{ $submissao->user->contato }} <br>
              <hr class="my-1">
              <strong>Título: </strong> {{ $submissao->titulo }} <br>
              <hr class="my-1">
              <strong>Autores: </strong> {{ $submissao->autor }} <br>
              <hr class="my-1">
              <strong>Palavras-Chave: </strong> {{ $submissao->key }} <br>
              <hr class="my-1">
              <strong>Resumo: </strong> <br>
              <p> {!! $submissao->resumo !!} </p>
              @if ($submissao->status === 'correcao')
                <strong>Correções: </strong> <br>
                <p> {!! $submissao->correcao !!} </p>
              @endif
              <hr class="my-1">
              @if ($submissao->comentario)
              <strong>Comentário para o editor: </strong> <br>
              <p> {{ $submissao->comentario }} </p>    
              @endif
              
              <!--<strong>Artigo: </strong> <a href=" {{ url("assets/pdf/{$submissao->file}") }} " class="btn btn-outline-primary" target="_blank"><i class="far fa-file-pdf"> PDF</i></a> <br>-->
              <strong>Artigo: </strong> <a href=" {{ asset("storage/public/file/{$submissao->file}") }} " class="btn btn-outline-primary" target="_blank"><i class="far fa-file-pdf"> PDF</i></a> <br>
            </div>
          </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          @if ($submissao->status === 'correcao')
            <form action=" {{ route('email-correcao') }} " method="post">
              @csrf
              <input type="text" value=" {{ $submissao->user->name }} " name="nome" hidden>
              <input type="text" value=" {{ $submissao->user->email }} " name="email" hidden>
              <input type="text" value=" {{ $submissao->correcao }} " name="correcao" hidden>
              <button type="submit" class="btn btn-outline-info"> <i class="fas fa-envelope-square"> E-mail</i> </button>
            </form>
          @elseif($submissao->status === 'pendente')
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal1">
              <i class="fas fa-thumbs-up"> Aprovar</i>
            </button>
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal2">
              <i class="fas fa-thumbs-down"> Reprovar</i>
            </button>
          @endif
          @if ($submissao->status === 'aprovado')
            <form action=" {{ route('email-aprovacao') }} " method="post">
              @csrf
              <input type="text" value=" {{ $submissao->user->name }} " name="nome" hidden>
              <input type="text" value=" {{ $submissao->user->email }} " name="email" hidden>
              <input type="text" value=" {{ $submissao->correcao }} " name="correcao" hidden>
              <a href=" {{ route('vincular-submissao', $submissao->id) }} " class="btn btn-outline-success" ><i class="fas fa-sign-in-alt"> Vincular</i></a>
              <button type="submit" class="btn btn-outline-info"> <i class="fas fa-envelope-square"> E-mail</i> </button>
            </form>
          @elseif($submissao->status === 'reprovado')
            <form action=" {{ route('email-reprovacao') }} " method="post">
              @csrf
              <input type="text" value=" {{ $submissao->user->name }} " name="nome" hidden>
              <input type="text" value=" {{ $submissao->user->email }} " name="email" hidden>
              <input type="text" value=" {{ $submissao->correcao }} " name="correcao" hidden>
              <button type="submit" class="btn btn-outline-danger"> <i class="fas fa-envelope-square"> E-mail</i> </button>
            </form>
          @endif
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      @if ($submissao->status == 'pendente')
        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingone">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Fazer correções?
                </button>
              </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingone" data-parent="#accordion">
              <div class="card-body">
                <form action=" {{ route('update-submissao') }} " method="post">
                  @csrf
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Correções</label>
                        <textarea name="textarea" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                  <input type="text" name="id" value=" {{ $submissao->id }} " hidden>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endif
      <!-- Modal Aprovar -->
      <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Aprovar artigo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action=" {{ route('update-submissao') }} " method="POST">
                @csrf
                @method('PUT')
                <label>Realmente deseja aprovar o artigo?</label>
                <input type="text" name="status" value="aprovado" hidden>
                <input type="text" name="id" value=" {{ $submissao->id }} " hidden>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-success">Aprovar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Reprovar -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Reprovar artigo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action=" {{ route('update-submissao') }} " method="post">
                @csrf
                <label>Realmente deseja reprovar o artigo?</label>
                <input type="text" name="status" value="reprovado" hidden>
                <input type="text" name="id" value=" {{ $submissao->id }} " hidden>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-danger">Reprovar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection