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
          <h3 class="card-title">Todas as Submissões Pendentes</h3>

        </div>
        <div class="card-body">
          
            <table id="table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Remetente</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Situação</th>
                        <th>Data submissão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submissoes as $s)
                        <tr>
                            <td> {{ $s->user->name }} </td>
                            <td> {{ $s->titulo }} </td>
                            <td> {{ $s->autor }} </td>
                            <td> <span class="badge badge-primary"> {{ $s->status }} </span></td>
                            <td> {{ $s->created_at }} </td>
                            <td>
                                <a class="btn btn-sm btn-round btn-icon btn-default" data-toggle="tooltip" title="Ver todas as informações" href="{{ route('show-submissao', $s->id) }}" role="button"><i class="fas fa-info-circle"></i> </a>
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