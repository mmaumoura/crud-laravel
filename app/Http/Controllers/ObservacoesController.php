<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Funcionarios;
use App\Models\Cargos;
use App\Models\ObservacaoFuncionarios;


class ObservacoesController extends Controller
{

    public function index()
    {
        $observacoes = ObservacaoFuncionarios::all();
        $funcionarios = Funcionarios::all();
        return view('observacoes', compact('observacoes', 'funcionarios'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ObservacaoFuncionarios::create([
            'observacao' => $request->observacao,
            'dataobservacao' => $request->dataobservacao,
            'id_funcionario' => $request->id_funcionario
        ]);

        return redirect()->to('/observacoes'); 
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $observacoes = ObservacaoFuncionarios::find($id);
        $observacoes->update($request->all());

        return redirect()->to('/observacoes'); 
    }

    public function destroy($id)
    {
        $observacoes = ObservacaoFuncionarios::find($id);
        $observacoes->delete();

        return redirect()->to('/observacoes'); 
    }
}
