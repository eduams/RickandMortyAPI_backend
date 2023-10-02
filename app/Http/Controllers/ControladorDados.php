<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Character;
use App\Models\Userunsafe;


class ControladorDados extends Controller
{
    public function index()
    {
        $dados = Character::all();
        return response()->json($dados);
    }

    public function salvarDados(Request $request)
    {
        $dados = Character::all();
        $dados = new Character();
        $dados->name = $request->input('name');
        $dados->species = $request->input('species');
        $dados->image = $request->input('image');
        $dados->url = $request->input('url');
        $dados->created_at = $request->input('created_at');
        $dados->updated_at = $request->input('updated_at');
        $dados->gender = $request->input('gender');
        $dados->location = $request->input('location');
        $dados->save();

        return response()->json($dados);
    }

    public function removerDados(Request $request){
        $url = $request->input('url');
        Character::where('url', $url)->delete();
        return response()->json(['message' => 'Registro removido com sucesso']);    
    }

    public function editaDados(Request $request){
        $name = $request->input('name');
        $url = $request->input('url');
        Character::where('url', $url)->update(array('name' => $name));

        return response()->json(['message' => 'Registro editado com sucesso']);    
    }

    //Autenticação feita sem hash de autenticação. Feito apenas como protótipo
    public function autenticarUser(Request $request){
        $login = $request->input ('login');
        $password = $request->input('password');
        $user = Userunsafe::where('login', $login)->where('password',$password)->first();
        if (!$user){
            return response()->json(false);    
        }
        else{
            return response()->json(true);    
        }
    }
    public function cadastrarUser(Request $request){
        $dados = new Userunsafe();      
        $dados-> login = $request->input('login');
        $dados-> password = $request->input('password');
        $dados->save();
        return response()->json(' gravado');
    }

}
