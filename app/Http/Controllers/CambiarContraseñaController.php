<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CorreoRecuperacion;
use App\Models\TokenAccesoCorreo;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class CambiarContraseñaController extends Controller
{
    //

    public function index () {
        return view('contraseñas.formulario-recuperar-contraseña');
    }

    public function enviarCorreoRecuperacion (Request $request){

        if(sizeof(User::where('email',$request['email'])->get()) > 0){
            // EXISTE EL CORREO EN EL SISTEMA
            // Comprobamos si no ha solicitado antes ya una recuperacion
            if(sizeof(TokenAccesoCorreo::where('email',$request['email'])->get()) == 0){
                

                $temp = new TokenAccesoCorreo;
                $temp->token = $this->getToken();
                $temp->email = $request['email'];
                $temp->activo = True;
                $temp->save();

                $usuario = User::where('email', $request['email'])->get();
                // dd($usuario);
                $usuario = $usuario[0];
                // dd($usuario, $usuario->id);

                $correo = [
                    'title' => 'Recuperación de Contraseña sistema de Objetivos Educacionales',
                    'body' => 'Adjuntamos link de acceso para recuperar contraseña Body',
                    'nombre' => $usuario->name,
                    'apellido' => $usuario->apellido,
                    'token' => $temp->token,
                    // 'idUsuario' => $usuario->id
                ];
                Mail::to($request['email'])->send(new CorreoRecuperacion($correo));
                session(['Exito' => 'Correo enviado, por favor revisa la bandeja de entrada.']);
                return view('contraseñas.formulario-correo-contraseña');
            } else{
                session(['Duplicado' => 'Ya se ha envíado un correo de recuperación, porfavor verifica tu bandeja de entrada.']);
                return view('contraseñas.formulario-correo-contraseña');
            }
        }else {
            session(['Error' => 'El correo enviado no existe en el sistema.']);
            return view('contraseñas.formulario-correo-contraseña');
        }

    }

    public function cambiarContraseñaBlade($token){
        // dd($token);
        if(sizeof(TokenAccesoCorreo::where('token',$token)->get()) > 0){
            return view('contraseñas.formulario-recuperar-contraseña', ['token' => $token]);
        } else {
            // dd('Token no válido');
            abort(404);
        }

    }

    public function cambiarContraseña(Request $request){
        // dd($request['contraseña1']);
        $token = TokenAccesoCorreo::where('token',$request['token'])->get();
        $token = $token[0];
        $user = User::where('email', $token->email)->get();
        $user = $user[0];
        $user->password = Hash::make($request['contraseña1']);
        $user->save();
        $token->delete();
        return redirect('/');

    }

    function getToken() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < 16; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}
}
