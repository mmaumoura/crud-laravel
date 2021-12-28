<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Funcionarios;
use App\Models\Cargos;


class FuncionariosController extends Controller
{

    public function index()
    {
        $funcionarios = Funcionarios::all();
        $cargos = Cargos::select('id', 'nomecargo')->get();
        return view('funcionarios', compact('funcionarios', 'cargos'));
    }

    public function store(Request $request)
    {
        Funcionarios::create([
            'nomefuncionario' => $request->nomefuncionario,
            'datacadastro' => $request->datacadastro,
            'id_cargo' => $request->id_cargo
        ]);

        return redirect()->to('/funcionarios'); 
    }

    public function update(Request $request, $id)
    {
        $funcionarios = Funcionarios::find($id);
        $funcionarios->update($request->all());

        return redirect()->to('/funcionarios'); 
    }

    public function destroy($id)
    {
        $funcionarios = Funcionarios::find($id);
        $funcionarios->delete();

        return redirect()->to('/funcionarios'); 
    }
}
