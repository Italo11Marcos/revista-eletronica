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
          <h3 class="card-title"> <b>v. {{ $revista->volume }} n. {{ $revista->numero }} ({{ $revista->ano }}) </b></h3>

        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <strong>Volume: </strong> {{ $revista->titulo }} <br>    
              <strong>Volume: </strong> {{ $revista->volume }} <br>
              <strong>Número: </strong> {{ $revista->numero }} <br>
              <strong>Publicação: </strong> {{ date('d/m/Y', strtotime($revista->created_at)) }} <br>
              <strong>Descrição: </strong> <br>
              <p> {!! $revista->descricao !!} </p>
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
          <form action=" {{ route('delete-revista') }} " method="post">
            @csrf
            @method('DELETE')
            <input type="text" value=" {{ $revista->id }} " name="id" hidden>
            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"> Excluir</i></button>
            <a href=" {{ route('edit-revista', $revista->id) }} " class="btn btn-outline-info"><i class="far fa-edit"> Editar</i></a>
          </form>
        </div>
        <!-- /.card-footer-->
      </div>
      <div class="card">
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Artigos vinculados a essa revista</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($artigos as $a)
                  <tr>
                    <th> {{ $a->titulo }} </th>
                    <th>
                      <a class="btn btn-sm btn-round btn-icon btn-default" data-toggle="tooltip" title="Ver todas as informações" href="{{ route('show-artigo', $a->id) }}" role="button"><i class="fas fa-info-circle"></i> </a>
                    </th>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection