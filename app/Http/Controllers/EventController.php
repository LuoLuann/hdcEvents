<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        //chamar todos eventos salvos no banco
        //esse comando é do ORM
        $events = Event::all();

        return view('welcome',['events'=>$events]);
        
        }

        public function create() {
            return view('events.create');
        }
        //criando a funcao para post no store
        //nela recebemos um request do form
        public function store(Request $request) {
            //dd($request);
            //agr criamos um objeto com esses dados
            //ent instacinamos a classe
            $event = new Event;
            $event->title = $request->title;
            $event->city = $request->city;
            $event->private = $request->private;
            $event->description = $request->description;
            $event->items = $request->items;
            
            //image uploud
            if($request->hasFile('image') && $request->file('image')->isValid()) {
                //criando uma var 
                $requestImage = $request->image;
                //esse extesion eh um método do laravel que pega a extensão da img
                $extension = $requestImage->extension();

                //agr vms trabalhar o nome da img
                //coloco em uma md5 criando uma hash, pego o nome original e
                //concateno com o horario "now" e dps concateno com a extensão do arquivo
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                //apos ter dado nome unico a img e arrumado a extensão, 
                //so falta salvar ela no path img numa pasta chamada events
                $requestImage->move(public_path("img/events"), $imageName);
                
                //agr alteramos a imagem do evento para a image com o novo nome

                $event->image = $imageName;
                //dd($event->image);
            }

            //agr basta salvar todos os dados no banco salvando o objeto instaciado
            //dd($request);

            $event->save();
            
            //agr so precisamos redicionar o user para alguma pagina
            //esse metodo "with" é para exxibir uma mensagem para o user
            return redirect('/')->with('msg', 'Evento criado com sucesso');
            //para esse with funcionar, ele precisa existir no main.blade numa tag chamada main

        }
        public function show($id) {
            //chamando a classe Event para usar o metodo findorfail
            $event = Event::findOrFail($id);

            return view('events.show', ['event'=> $event]);
        }
        public function login() {
            return view('events.login');
        }
        public function cadastrar() {
            return view('events.cadastrar');
        }
}
