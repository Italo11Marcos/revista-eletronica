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
          <h3>Vincular à artigo</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <strong>Título: </strong> {{ $submissao->titulo }} <br>
              <hr class="my-1">
              <strong>Autores: </strong> {{ $submissao->autor }} <br>
              <hr class="my-1">
              <strong>Palavras-Chave: </strong> {{ $submissao->key }} <br>
              <hr class="my-1">
              <strong>Resumo: </strong> <br>
              <p> {{ $submissao->resumo }} </p>
              <strong>Artigo: </strong> <a href=" {{ url("storage/file/{$submissao->file}") }} " class="btn btn-outline-primary" target="_blank"><i class="far fa-file-pdf"> PDF</i></a> <br>
            </div>
            <div class="col-md-4">
                <form action=" {{ route('store-vincular-submissao') }} " method="post">
                    @csrf
                    <div class="form-group">
                        <label>Páginas</label>
                        <input type="text" name="pagina" placeholder="Exemplo: 01-09" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Revista</label>
                        <select name="revista_id" class="form-control">
                            @foreach ($revistas as $r)
                                <option value=" {{ $r->id }} "> v. {{ $r->volume }} n. {{ $r->numero }} ({{ $r->ano }}) </option>
                            @endforeach
                        </select>
                    </div>
                    <input type="text" name="titulo" value=" {{ $submissao->titulo }} " hidden>
                    <input type="text" name="autor" value=" {{ $submissao->autor }} " hidden>
                    <input type="text" name="file" value=" {{ $submissao->file }} " hidden>
                    <input type="text" name="key" value=" {{ $submissao->key }} " hidden>
                    <input type="text" name="resumo" value=" {{ $submissao->resumo }} " hidden>
                    <button type="submit" class="btn btn-success">Vincular</button>
                </form>
            </div>
          </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection