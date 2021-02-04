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
          <h3 class="card-title">Cadastrar Revista</h3>  
        </div>
        <div class="card-body">
          
            <form action=" {{ route('store-artigo') }} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" class="form-control" placeholder="título..." name="titulo" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Página</label>
                            <input type="text" class="form-control" name="pagina" placeholder="Exemplo: 01-12" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Resumo</label>
                            <textarea class="textarea" rows="5" placeholder="resumo..." name="resumo" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="file" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Autores</label>
                            <textarea class="form-control" rows="2" placeholder="Autor 1, Autor 2" name="autor" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Palavras-Chave</label>
                            <textarea class="form-control" rows="2" placeholder="Exemplo: Política - Direito Público - Mulher" name="key" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Selecionie a revista</label>
                            <select name="revista_id" class="form-control">
                                @foreach ($revistas as $r)
                                    <option value=" {{ $r->id }} "> v. {{ $r->volume }} n. {{ $r->numero }} ({{ $r->ano }}) </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection