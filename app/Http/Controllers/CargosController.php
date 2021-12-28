<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Funcionarios;
use App\Models\Cargos;


class CargosController extends Controller
{

    public function index()
    {
        $cargos = Cargos::all();
        
        return view('cargos', compact('cargos'));
    }

    public function store(Request $request)
    {
        Cargos::create([
            'nomecargo' => $request->nomecargo,
            'descricaocargo' => $request->descricaocargo
        ]);

        return redirect()->to('/cargos'); 
    }

    public function update(Request $request, $id)
    {
        $cargos = Cargos::find($id);
        $cargos->update($request->all());

        return redirect()->to('/cargos'); 
    }

    public function destroy($id)
    {
        $cargos = Cargos::find($id);
        $cargos->delete();

        return redirect()->to('/cargos'); 
    }

    public function funcionariosCargo($id){
        $funcionarios = Funcionarios::where('id_cargo', $id)->get();
        $cargo = Cargos::where('id', $id)->get();

        return view('cargosFuncionarios', compact('funcionarios', 'cargo'));
    }

}
