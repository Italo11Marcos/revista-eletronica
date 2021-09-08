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
          <h3 class="card-title"> <b>{{ $artigo->titulo }}</b></h3>

        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <strong>Autores: </strong> {{ $artigo->autor }} <br>
              <strong>Palavras-Chave: </strong> {{ $artigo->key }} <br>
              <strong>Páginas: </strong> {{ $artigo->pagina }} <br>
              <strong>Resumo: </strong> <br>
              <p> {!! $artigo->resumo !!} </p>
              <!--<strong>Artigo: </strong> <a href=" {{ url("assets/pdf/{$artigo->file}") }} " class="btn btn-outline-primary" target="_blank"><i class="far fa-file-pdf"> PDF</i></a> <br>-->
              <strong>Artigo: </strong> <a href=" {{ asset("storage/public/file/{$artigo->file}") }} " class="btn btn-outline-primary" target="_blank"><i class="far fa-file-pdf"> PDF</i></a> <br>
            </div>
            <div class="col-md-4">
              <div class="col-auto d-none d-lg-block">
                <!--<img src=" {{ url("assets/img/{$revista->capa}") }} " alt="..." class="bd-placeholder-img" width="200" height="250"; >-->
                <img src=" {{ asset("storage/public/capa/{$revista->capa}") }} " alt="..." class="bd-placeholder-img" width="200" height="250"; >
              </div>
            </div>
        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <form action=" {{ route('delete-artigo') }} " method="post">
            @csrf
            @method('DELETE')
            <input type="text" value=" {{ $artigo->id }} " name="id" hidden>
            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"> Excluir</i></button>
            <a href=" {{ route('edit-artigo', $artigo->id) }} " class="btn btn-outline-info"><i class="far fa-edit"> Editar</i></a>
          </form>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection