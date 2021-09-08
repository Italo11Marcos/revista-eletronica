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
          
            <form action=" {{ route('store-revista') }} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" class="form-control" placeholder="Título da revista..." name="titulo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Volume</label>
                            <input type="number" class="form-control" placeholder="Volume da revista..." name="volume" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Número</label>
                            <input type="number" class="form-control" placeholder="Número da revista..." name="numero" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Ano</label>
                            <input type="number" class="form-control" placeholder="Ano da revista..." name="ano" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="capa" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="textarea" rows="5" placeholder="Descrição da revista ..." name="descricao"></textarea>
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