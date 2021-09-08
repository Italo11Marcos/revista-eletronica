@extends('site.base')

@section('content')
    
    <div class="col-md-12">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-auto d-none d-lg-block">
                <!--<img src=" {{ url("assets/img/{$revista->capa}") }} " alt="..." class="bd-placeholder-img" width="200" height="250"; >-->
                <img src=" {{ asset("storage/public/capa/{$revista->capa}") }} " alt="..." class="bd-placeholder-img" width="200" height="250"; >
            </div>
            <div class="col p-4 d-flex flex-column position-static">
            <h5 > v. {{ $revista->volume }} n. {{ $revista->numero }} ({{ $revista->ano }}): {{ $revista->titulo }} </h5>
            <p class="card-text">Publicação: {{ date('d/m/Y', strtotime($revista->created_at)) }}</p>
            <p class="card-text"> {!! $revista->descricao !!} </p>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm ">
            <div class="card-body">
                <b> {{ $artigo->titulo }} </b>
                <hr class="my-2">
                <p> <b>Autor: </b> {{ $artigo->autor }} </p>
                <hr class="my-1">
                <p> <b>Palavras-chave: </b>  {{ $artigo->key }} </p>
                <hr class="my-1">
                <p> <b>Páginas: </b>  {{ $artigo->pagina }} </p>
                <hr class="my-1">
                <b>Resumo: </b>
                <p> {!! $artigo->resumo !!} </p>
                <hr class="my-1">
                <!--<a href=" {{ url("assets/pdf/{$artigo->file}") }} " class="btn btn-outline-primary" target="_blank"><i class="far fa-file-pdf"> PDF</i></a>-->
                <a href=" {{ asset("storage/public/file/{$artigo->file}") }} " class="btn btn-outline-primary" target="_blank"><i class="far fa-file-pdf"> PDF</i></a>
            </div>
        </div>
    </div>

@endsection