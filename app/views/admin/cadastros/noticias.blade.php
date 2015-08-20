@extends('templates.default')
@section('conteudo')

@include('includes.menu_admin')

{{Form::open(array('method'=>'post', 'url'=>'painel/cadastro/noticias', 'files'=>true))}}
<h1>Cadastro de Eventos</h1>
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
    <strong>Registro salvo com sucesso!</strong>
</div>
@endif
<div class="row">
    <h4>Dados da noticia</h4>
    <div class="medium-6 columns">
        {{ Form::label('titulo', 'Título da Noticia') }}
        {{ Form::text('titulo','',array('id'=>'titulo')) }}
    </div>
</div>
<div class="row">
    <div class="medium-12 columns">
        {{ Form::label('descricao', 'Descrição da Noticia') }}
        {{ Form::textarea('descricao', null, array('size' => '30x5')) }}
    </div>
</div>
<div class="row">
    <div class="medium-6 columns">
        {{ Form::label('img', 'Imagem da Noticia') }}
        {{ Form::file('img') }}
    </div>
    <div class="medium-6 columns end">
        {{ Form::label('destaque', 'Destaque') }}
        {{ Form::radio('destaque', '1', array('id'=>'sim')) }}{{ Form::label('sim', 'Sim') }} {{ Form::radio('destaque', '0', true, array('id'=>'nao')) }}{{ Form::label('nao', 'Não') }}
    </div>
</div>
<div class="row">
    <h4>Categoria da noticia</h4>
    <div class="medium-6 columns end">
        {{ Form::label('categoria', 'Categoria') }}
        {{ Form::select('categoria[]', array(
                    '1'=>'categoria 1',
                    '2'=>'categoria 2',
                    '3'=>'categoria 3',
                    '4'=>'categoria 4',
                    '5'=>'categoria 5'
                    ), '', array('id'=>'categoria','multiple')) }}
    </div>
</div>
<div class="row">
    <div class="medium-12 columns">
        <br />
        {{ Form::button('Cadastrar', array('type'=>'submit', 'class'=>'button', 'title'=>'Cadastrar dados da Noticia')) }}
        {{ Form::reset('Limpar Campos', array('class'=>'button', 'title'=>'Limpar dados da Noticia')) }}
    </div>
</div>
{{Form::close()}}
@stop
