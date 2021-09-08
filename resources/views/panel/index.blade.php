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
          <h3 class="card-title">Painel de Controle</h3>

        </div>
        <a href=" {{ url('foo') }} ">tete</a>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                  <div class="card bg-primary">
                    <div class="card-body text-light">
                      <h5 class="card-title"> {{ $countRevista }} Revistas Cadastradas</h5>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card bg-primary">
                    <div class="card-body text-light">
                      <h5 class="card-title"> {{ $countArtigo }} Artigos Cadastrados</h5>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                  <div class="card bg-success">
                    <div class="card-body text-light">
                      <h5 class="card-title"> {{ $countSubAprovado }} Submissões Aprovados</h5>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card bg-danger">
                    <div class="card-body text-light">
                      <h5 class="card-title"> {{ $countSubReprovado }} Submissões Reprovados</h5>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                  <div class="card bg-warning">
                    <div class="card-body text-light">
                      <h5 class="card-title"> {{ $countUser }} Usuários Cadastrados</h5>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card bg-warning">
                    <div class="card-body text-light">
                      <h5 class="card-title"> {{ $countSub }} Submissões Realizadas</h5>
                    </div>
                  </div>
                </div>
              </div>
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