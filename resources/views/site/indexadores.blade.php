@extends('site.base')

@section('content')
    
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6 text-center p-3">
            <img src="{{ asset('assets/indexadores/indexador_livre.png') }}" alt="Livre - Revistas de Livre Acesso" class="img-fluid" style="width: 300px;">
        </div>
        <div class="col-md-6 text-center p-3">
            <img src="{{ asset('assets/indexadores/indexador_diadorim.png') }}" alt="Diadorim" class="img-fluid" style="width: 300px;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 text-center p-3">
            <img src="{{ asset('assets/indexadores/indexador_sumarios.png') }}" alt="Sumários - Sumários de Revistas Brasileiras" class="img-fluid" style="width: 300px;">
        </div>
        <div class="col-md-6 text-center p-3">
            <img src="{{ asset('assets/indexadores/indexador_google.png') }}" alt="Google Scholar" class="img-fluid" style="width: 300px;">
        </div>
    </div>
</div>

@endsection