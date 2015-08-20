@extends('templates.default')
@section('conteudo')

@include('includes.menu_admin')

<div class="row">
    <div class="medium-12 columns"><!-- Inicio da area do conteudo -->
        <h3>Lista de Empresas</h3>
        @if ( isset($ok))
        <div>
            <strong>Dados alterados com sucesso!</strong>
        </div>
        @endif
        @if ( isset($excluido))
        <div>
            <strong>Dados apagados com sucesso!</strong>
        </div>
        @endif
        <div class="row">
            {{Form::open(array('method'=>'post', 'url'=>"painel/filtrar/eventos/"))}}
            <div class="medium-6 columns">
                <input type="radio" name="tipo" value="1" id="id"><label for="id">ID</label>
                <input type="radio" name="tipo" value="2" id="nome" checked="true"><label for="nome">Nome do evento</label>
            </div>
        </div>
        <div class="row">
            <div class="medium-4 columns">
                {{ Form::text('valor','',array('id'=>'busca')) }}
            </div>
            <div class="medium-2 columns end">
                {{ Form::button('Buscar', array('type'=>'submit', 'class'=>'button', 'title'=>'Buscar empresa')) }}
            </div>
            {{Form::close()}}
        </div>
        <table >
            <thead>
                <tr>
                    <td><strong>Código</strong></td>
                    <td><strong>Nome</strong></td>
                    <td><strong>Local</strong></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($dados as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    <td>{{$d->nome}}</td>
                    <td>{{$d->cidade}}/{{$d->estado}}</td>
                    <td>
                        {{Form::open(array('method'=>'post', 'url'=>"painel/excluir/evento/$d->id"))}}
                        {{Form::hidden('_method', 'DELETE') }}
                        <ul class="button-group round">
                            <li><a href="{{URL::to("painel/editar/evento/$d->id")}}" class="button secondary tiny" title="Editar dados"><i class="fi-pencil" style="font-size: 1rem"></i></a></li>
                            <li><a href="{{URL::to("painel/criar/album/$d->id")}}" class="button secondary tiny" title="Criar Album"><i class="fi-photo" style="font-size: 1rem"></i></a></li>
                            <li><button class="button alert tiny" title="Excluir registro" type="submit"><i class="fi-trash" style="font-size: 1rem"></i></button></li>
                        </ul>
                        {{Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$dados->links()}}
    </div><!-- Fim area do conteudo -->
</div>
@stop
