<?php
    namespace App\Http\Controllers; //un espacio de trabajo de esta clase

    use Illuminate\Http\Request;

    class UserController extends Controller{
        public function index(){
            return view('prueba');
        }
    }

?>