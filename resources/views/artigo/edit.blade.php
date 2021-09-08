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
          <h3 class="card-title"> <b> {{ $artigo->titulo }} </b> </h3>

        </div>
        <div class="card-body">
          
            <form action=" {{ route('update-artigo') }} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="text" value=" {{ $artigo->id }} " name="id" hidden>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" class="form-control" value=" {{ $artigo->titulo }} " name="titulo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Página</label>
                            <input type="text" class="form-control" name="pagina" placeholder="Exemplo: 01-12" value=" {{ $artigo->pagina }} ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Resumo</label>
                            <textarea class="form-control" rows="7" name="resumo">{{ $artigo->resumo }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Autores</label>
                            <textarea class="form-control" rows="2" name="autor">{{ $artigo->autor }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Palavras-Chave</label>
                            <textarea class="form-control" rows="2" name="key">{{ $artigo->key }}</textarea>
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