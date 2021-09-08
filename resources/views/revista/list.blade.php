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
          <h3 class="card-title">Todas as Revistas</h3>

        </div>
        <div class="card-body">
          
            <table id="table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Volume</th>
                        <th>Número</th>
                        <th>Ano</th>
                        <th>Publicação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($revistas as $r)
                        <tr>
                            <td> {{ $r->titulo }} </td>
                            <td> {{ $r->volume }} </td>
                            <td> {{ $r->numero }} </td>
                            <td> {{ $r->ano }} </td>
                            <td> {{ $r->created_at }} </td>
                            <td>
                                <a class="btn btn-sm btn-round btn-icon btn-default" data-toggle="tooltip" title="Ver todas as informações" href="{{ route('show-revista', $r->id) }}" role="button"><i class="fas fa-info-circle"></i> </a>
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