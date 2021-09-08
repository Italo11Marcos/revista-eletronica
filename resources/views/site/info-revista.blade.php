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

    @foreach ($artigos as $a)
    <div class="col-md-12">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm ">
            <div class="card-body">
                <b> <a href=" {{ route('info-artigo', $a->id) }} "> {{ $a->titulo }} </a></b>
                <hr class="my-2">
                <p> {{ $a->autor }} </p>
                <hr class="my-1">
                <!--<a href=" {{ url("assets/pdf/{$a->file}") }} " class="btn btn-outline-primary" target="_blank"><i class="far fa-file-pdf"> PDF</i></a>-->
                <a href=" {{ asset("storage/public/file/{$a->file}") }} " class="btn btn-outline-primary" target="_blank"><i class="far fa-file-pdf"> PDF</i></a>
            </div>
        </div>
    </div>
    @endforeach

@endsection