<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author alexandre
 */
class AdminController extends BaseController {

    public function painel() {

        return View::make('admin/painel');
    }

    public function createEventos() {

        return View::make('admin/cadastros/eventos');
    }

    public function storeEventos() {

        $dados = new Evento();

        $dados->nome = Input::get('nome');
        $dados->local = Input::get('local');
        $dados->data_evento = Input::get('ano') . '/' . Input::get('mes') . '/' . Input::get('dia') . ' ' . Input::get('hr') . ':' . Input::get('min');
        $dados->valor_ingresso = Input::get('valor');
        $dados->artista_principal = Input::get('artista');
        $dados->artista_secundario = Input::get('musicos');
        $dados->descricao = Input::get('descricao');
        $dados->endereco = Input::get('endereco');
        $dados->numero = Input::get('numero');
        $dados->complemento = Input::get('complemento');
        $dados->bairro = Input::get('bairro');
        $dados->cidade = Input::get('cidade');
        $dados->estado = Input::get('estado');
        $dados->coordenadas = Input::get('coord');
        $dados->cronograma = Input::get('resp');
        $dados->ativo = 1;
        $dados->album = 0;

        $dados->save();

        $destino = str_replace(' ', '_', strtolower(public_path() . "/images/eventos/$dados->nome"));

        if (Input::hasFile('img')) {
            $nome = "evento_" . str_replace(' ', '_', strtolower($dados->nome)) . "." . Input::file('img')->getClientOriginalExtension();
            $img = Input::file('img');
            $img->move($destino, $nome);
        }

        return View::make('/admin/cadastros/eventos', array(
                    'ok' => true
        ));
    }

    public function createAlbum($id) {

        $dados = Evento::select('id', 'nome')->where('id', '=', $id)->get();

        return View::make('admin.cadastros.albuns_foto', array(
                    'dados' => $dados
        ));
    }

    public function storeAlbum($id) {

        if (Input::hasFile('imgs')) {
            foreach (Input::file('imgs') as $file) {
                echo $file->getClientOriginalName();
            }
        }
    }

    public function createNoticias() {

        return View::make('admin/cadastros/noticias');
    }

    public function storeNoticias() {

        $dados = new Post();

        $dados->titulo = Input::get('titulo');
        $dados->conteudo = Input::get('descricao');
        $dados->categorias = implode(',', Input::get('categoria'));
        $dados->destaque = Input::get('destaque');

        $dados->save();

        $destino = str_replace(' ', '_', strtolower(public_path() . "/images/noticias/"));

        if (Input::hasFile('img')) {
            $nome = "noticia_" . str_replace(' ', '_', $dados->titulo) . "." . Input::file('img')->getClientOriginalExtension();
            $img = Input::file('img');
            $img->move($destino, $nome);
        }

        return View::make('/admin/cadastros/noticias', array(
                    'ok' => true
        ));
    }

    public function showEventos() {

        $dados = Evento::paginate(20);

        return View::make('admin/relatorios/eventos', array(
                    'dados' => $dados
        ));
    }

}
