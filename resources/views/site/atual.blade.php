@extends('site.base')

@section('content')

<div class="col-md-12">
    <div class="row no-gutters border rounded overflow-hidden position-relative">
        <a href=" {{ url("assets/edital/ErgaOmnes-ChamadaPublicacao-022021.pdf") }} " class="btn btn-outline-success btn-lg" target="_blank"><i class="far fa-file-pdf"> Nova Chamada Edital 01/2021</i></a>
    </div>
    <br/>
</div>

<div class="col-md-12">
    <div class="row no-gutters border rounded overflow-hidden  position-relative">
        <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary">Atual</strong>
        @if($r)
        <h5 > v. {{ $r->volume }} n. {{ $r->numero }} ({{ $r->ano }}): {{ $r->titulo }} </h5>
        <p class="card-text ">Publicação: {{ date('d/m/Y', strtotime($r->created_at)) }}</p>
        <p class="card-text "> {!! $r->descricao !!} </p>
        <a href=" {{ route('info-revista', $r->id) }} " class="stretched-link">Artigos</a>
        </div>
        <div class="col-auto d-none d-lg-block">
        <!--<img src=" {{ url("assets/img/{$r->capa}") }} " alt="..." class="bd-placeholder-img" width="200" height="250"; >-->
        <img src=" {{ asset("storage/public/capa/{$r->capa}") }} " alt="..." class="bd-placeholder-img" width="200" height="250"; >
        </div>
        @else
        <p>Ainda não há revistas cadastradas</p>
        @endif
    </div>
</div>

@endsection