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
          <h3 class="card-title"><h5><b>v. {{ $revista->volume }} n. {{ $revista->numero }} ({{ $revista->ano }})</b></h5></h3>

        </div>
        <div class="card-body">
          
            <form action=" {{ route('update-revista') }} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" class="form-control" value=" {{ $revista->titulo }} " name="titulo" required>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <input type="text" value=" {{ $revista->id }} " name="id" hidden>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Volume</label>
                            <input type="text" class="form-control" value=" {{ $revista->volume }} " name="volume" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Número</label>
                            <input type="text" class="form-control" value=" {{ $revista->numero }} " name="numero" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Ano</label>
                            <input type="text" class="form-control" value=" {{ $revista->ano }} " name="ano" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="capa">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Textarea</label>
                            <textarea class="textarea" rows="5" name="descricao">{!! $revista->descricao !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Editar</button>
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