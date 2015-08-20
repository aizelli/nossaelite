@extends('templates.default')
@section('conteudo')

@include('includes.menu_admin')

{{Form::open(array('method'=>'post', 'url'=>'painel/cadastro/eventos', 'files'=>true))}}
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
    <h4>Dados do Evento</h4>
    <div class="medium-3 columns">
        {{ Form::label('nome', 'Nome do Evento') }}
        {{ Form::text('nome','',array('id'=>'nome')) }}
    </div>
    <div class="medium-3 columns">
        {{ Form::label('local', 'Local do Evento') }}
        {{ Form::text('local','',array('id'=>'local')) }}
    </div>
    <div class="medium-6 columns">
        {{ Form::label('data', 'Data do Evento') }}
        <div class="row">
            <div class="medium-2 columns">
                {{ Form::selectRange('dia', 01, 31) }}
            </div>
            <div class="medium-3 columns">
                {{ Form::select('mes', array(
                            '01'=>'Janeiro',
                            '02'=>'Fevereiro',
                            '03'=>'Março',
                            '04'=>'Abril',
                            '05'=>'Maio',
                            '06'=>'Junho',
                            '07'=>'Julho',
                            '08'=>'Agosto',
                            '09'=>'Setembro',
                            '10'=>'Outubro',
                            '11'=>'Novembro',
                            '12'=>'Dezembro'
                            ), '', array('id'=>'mes')) }}
            </div>
            <div class="medium-3 columns">
                {{ Form::selectYear('ano', 2015, 2017) }}
            </div>
            <div class="medium-2 columns">
                {{ Form::selectRange('hr', 00, 23) }}
            </div>
            <div class="medium-2 columns">
                {{ Form::selectRange('min', 00, 59) }}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="medium-4 columns">
        {{ Form::label('valor', 'Valor da Entrada') }}
        {{ Form::text('valor','',array('id'=>'valor')) }}
    </div>
    <div class="medium-4 columns">
        {{ Form::label('artista', 'Artista Principal') }}
        {{ Form::text('artista','',array('id'=>'artista')) }}
    </div>
    <div class="medium-4 columns">
        {{ Form::label('musicos', 'Musicos Participantes') }}
        {{ Form::text('musicos','',array('id'=>'musicos')) }}
    </div>
</div>
<div class="row">
    <div class="medium-12 columns">
        {{ Form::label('descricao', 'Descrição do Evento') }}
        {{ Form::textarea('descricao', null, array('size' => '30x5')) }}
    </div>
</div>
<div class="row">
    <div class="medium-6 columns">
        {{ Form::label('img', 'Imagem do evento') }}
        {{ Form::file('img') }}
    </div>
    <div class="medium-6 columns end">
        {{ Form::label('cron', 'Adicionar ao Cronograma') }}
        {{ Form::radio('resp', '1', array('id'=>'sim')) }}{{ Form::label('sim', 'Sim') }} {{ Form::radio('resp', '0', true, array('id'=>'nao')) }}{{ Form::label('nao', 'Não') }}
    </div>
</div>
<div class="row">
    <h4>Endereço do Evento</h4>
    <div class="medium-6 columns">
        {{ Form::label('endereco', 'Endereço') }}
        {{ Form::text('endereco','',array('id'=>'endereco')) }}
    </div>
    <div class="medium-2 columns">
        {{ Form::label('numero', 'Número') }}
        {{ Form::text('numero','',array('id'=>'numero')) }}
    </div>
    <div class="medium-4 columns">
        {{ Form::label('complemento', 'Complemento') }}
        {{ Form::text('complemento','',array('id'=>'complemento')) }}
    </div>
</div>
<div class="row">
    <div class="medium-4 columns">
        {{ Form::label('bairro', 'Bairro') }}
        {{ Form::text('bairro','',array('id'=>'bairro')) }}
    </div>
    <div class="medium-3 columns">
        {{ Form::label('cidade', 'Cidade') }}
        {{ Form::select('cidade', array('0'=>'Selecione'), '', array('id'=>'cidade')) }}
    </div>
    <div class="medium-3 columns">
        {{ Form::label('estado', 'Estado') }}
        {{ Form::select('estado', array('0'=>'Selecione'), '', array('id'=>'estado')) }}
    </div>
    <div class="medium-2 columns">
        {{ Form::label('coord', 'Coordenadas') }}
        {{ Form::text('coord','',array('id'=>'coord')) }}
    </div>
</div>
<div class="row">
    <div class="medium-12 columns">
        {{ Form::button('Cadastrar', array('type'=>'submit', 'class'=>'button', 'title'=>'Cadastrar dados do evento')) }}
        {{ Form::reset('Limpar Campos', array('class'=>'button', 'title'=>'Limpar dados do evento')) }}
    </div>
</div>
{{Form::close()}}
@stop
