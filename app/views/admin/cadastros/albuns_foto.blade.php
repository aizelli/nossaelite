@extends('templates.default')
@section('conteudo')

@include('includes.menu_admin')
@foreach($dados as $d)
{{Form::open(array('method'=>'post', 'url'=>"/painel/criar/album/$d->id", 'files'=>true))}}
<h1>Upload de Album de Fotos</h1>
@if ( count($errors) > 0)
<div>
    <strong>Erro(s) encontrado(s):</strong>
    <ul>
        @foreach ($errors->all() as $e)
        <li>{{ $e }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (isset($ok))
<div>
    <strong>Imagens enviadas com sucesso!</strong>
</div>
@endif
<div class="row">
    <h3>Evento</h3>

    <div class="medium-2 columns">
        {{ Form::label('codigo', 'Código') }}
        {{ Form::text('codigo',$d->id,array('id'=>'codigo','disabled')) }}
    </div>
    <div class="medium-4 columns end">
        {{ Form::label('nome', 'Evento') }}
        {{ Form::text('nome',$d->nome,array('id'=>'nome', 'disabled')) }}
    </div>

</div>
<div class="row">
    <div class="medium-12 columns">
        {{ Form::label('imgs', 'Fotos do Evento') }}
        {{ Form::file('imgs', array('id'=>'imgs', 'multiple')) }}
    </div>
</div>
<div class="row">
    <div class="medium-12 columns">
        <br />
        {{ Form::button('Criar Album', array('type'=>'submit', 'class'=>'button', 'title'=>'Criar Album')) }}
        {{ Form::reset('Limpar Campos', array('class'=>'button', 'title'=>'Limpar dados da Noticia')) }}
    </div>
</div>
{{Form::close()}}
@endforeach
@stop
