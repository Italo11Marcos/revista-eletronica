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
          <h3 class="card-title">Todos os Usuários Cadastrados</h3>

        </div>
        <div class="card-body">
          
            <table id="table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Contato</th>
                        <th>Função</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                        <tr>
                            <td> {{ $u->name }} </td>
                            <td> {{ $u->email }} </td>
                            <td> {{ $u->contato }} </td>
                            @if ( $u->role == 'user' )
                                <td> <span class="badge badge-secondary"> Normal </span></td>
                            @elseif( $u->role == 'admin' )
                                <td> <span class="badge badge-success"> Admin </span></td>
                            @else
                                <td> <span class="badge badge-warning"> Editor </span></td>
                            @endif   
                            <td> {{ $u->created_at }} </td>
                            <td>
                                <a class="btn btn-sm btn-round btn-icon btn-default" data-toggle="tooltip" title="Ver todas as informações" href="{{ route('show-usuario', $u->id) }}" role="button"><i class="fas fa-info-circle"></i> </a>
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