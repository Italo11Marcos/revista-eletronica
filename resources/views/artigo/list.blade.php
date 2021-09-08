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
          <h3 class="card-title">Todas os Artigos</h3>

        </div>
        <div class="card-body">
          
            <table id="table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autores</th>
                        <th>Palavras-Chave</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artigos as $a)
                        <tr>
                            <td> {{ $a->titulo }} </td>
                            <td> {{ $a->autor }} </td>
                            <td> {{ $a->key }} </td>
                            <td>
                                <a class="btn btn-sm btn-round btn-icon btn-default" data-toggle="tooltip" title="Ver todas as informações" href="{{ route('show-artigo', $a->id) }}" role="button"><i class="fas fa-info-circle"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

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