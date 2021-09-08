@extends('site.base')

@section('content')
    
{{--
https://www.codeply.com/go/XefCTinzkY/bootstrap-4-navbar-with-login-form    
--}}

@foreach ($revistas as $r)
<div class="col-md-12">
    <div class="row no-gutters border rounded overflow-hidden  position-relative">
        <div class="col p-4 d-flex flex-column position-static">
        <h5 > v. {{ $r->volume }} n. {{ $r->numero }} ({{ $r->ano }}): {{ $r->titulo }} </h5>
        <p class="card-text ">Publicação: {{ date('d/m/Y', strtotime($r->created_at)) }}</p>
        <p class="card-text "> {{ $r->descricao }} </p>
        <a href=" {{ route('info-revista', $r->id) }} " class="stretched-link">Artigos</a>
        </div>
        <div class="col-auto d-none d-lg-block">
        <img src=" {{ url("storage/capa/{$r->capa}") }} " alt="..." class="bd-placeholder-img" width="200" height="250"; >
        </div>
    </div>
</div>
@endforeach

<div class="col-md-12">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary">World</strong>
        <h3 class="mb-0">Featured post</h3>
        <div class="mb-1 text-muted">Nov 12</div>
        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
    </div>
</div>

@endsection