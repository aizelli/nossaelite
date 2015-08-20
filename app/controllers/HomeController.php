<?php

class HomeController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function index() {
        $eventos = Evento::orderBy('data_evento', 'asc')->take(2)->get();
        $prox_evento = Evento::orderBy('data_evento', 'asc')->take(1)->where('cronograma', '=', 1)->get();
        return View::make('index', array(
                    'eventos' => $eventos,
                    'prox_evento' => $prox_evento
        ));
    }

    public function eventoDetalhes() {

        return View::make('event-detail');
    }

}
