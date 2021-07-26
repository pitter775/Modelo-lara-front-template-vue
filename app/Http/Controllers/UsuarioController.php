<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDOException;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.usuario.index');
    }
    public function all()
    {        
        $users = User::all();
        return json_encode($users);
    }
    public function cadastro(Request $request){
        $password = $request->input('senha');   
        $id_geral = $request->input('id_geral'); 
        $mensagem = '';
        
        if($id_geral == ''){
            $tem = User::where('email', $request->input('email'))->get();
            if(!count($tem) == 0){return 'Erro, Já existe esse email cadastrado no sistema.';}
            $dados = new User();   
            $mensagem = 'novo';         
        }else{
            $dados = User::find($id_geral);
            $mensagem = 'editado'; 
        }        
        $dados->name = $request->input('fullname');
        $dados->email = $request->input('email');
        if(isset($password)){
            if($password !== ''){
              $dados->password = Hash::make($request->input('senha')); 
            }            
        }
        $dados->save(); 
        if($mensagem == 'novo'){
            return $dados->id;
        }else{
            return $mensagem;
        }
        
    }
    public function delete($id){
        $deletar = User::find($id);
        if(isset($deletar)){
            try {
                $deletar->delete();
                return 'Ok';
            }catch (PDOException $e) {
                if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                    return 'Erro';
                }
            }
        }
    }
}
