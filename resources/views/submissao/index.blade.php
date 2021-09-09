@extends('site.base')

@section('content')
    
<div class="col-md-12">
    <div class="card">
        <div class="card-box">
            @include('alerts')
            <h4>Submeter Artigo</h4>
            <form action=" {{ route('store-submissao') }} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Título:</label>
                            <input type="text" class="form-control" name="titulo" placeholder="Título do artigo" maxlength="255" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Autor: </label>
                            <input type="text" class="form-control" name="autor" placeholder="Exemplo: Autor 1, Autor 2" maxlength="255" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Resumo: </label>
                            <textarea class="form-control" name="resumo" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Palavras-Chave: </label>
                            <input type="text" class="form-control" name="key" placeholder="Exemplo: Política - Direito Privado" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="file" name="file" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Comentário para o editor? </label>
                            <textarea class="form-control" name="comentario" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <input type="text" name="user_id" value=" {{ Auth::user()->id }} " hidden>
                <button type="submit" class="btn btn-success">Enviar Artigo</button>
            </form>
        </div>
    </div>
</div>

@endsection