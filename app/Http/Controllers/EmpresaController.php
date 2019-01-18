<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        if ($empresa = Empresa::where('user_id', '=', $user_id)->first()) {
            return view('empresa.index', compact('empresa'));
        }

        return redirect('empresa/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();

        if ($empresa = Empresa::where('user_id', $user_id)->first()) {
            return redirect('empresa')->with(compact('empresa'));
        }

        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'string', 'digits_between:10,11'],
            'endereco' => ['required', 'string'],
            'cep' => ['required', 'string', 'min:9'],
            'cnpj' => ['required', 'string', 'min:9']
        ]);

        $empresa = new Empresa([
            'nome' => $request->get('nome'),
            'telefone' => $request->get('telefone'),
            'endereco' => $request->get('endereco'),
            'cep' => $request->get('cep'),
            'cnpj' => $request->get('cnpj'),
            'user_id' => $user_id
        ]);

        $empresa->save();
        return redirect('/home')->with('success', 'Obrigado por concluir seu cadastro, agora você já pode cadastrar seus fornecedore.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'string', 'digits_between:10,11'],
            'endereco' => ['required', 'string'],
            'cep' => ['required', 'string', 'min:9'],
            'cnpj' => ['required', 'string', 'min:9']
        ]);


        $empresa = Empresa::find($id);
        $empresa->nome = $request->get('nome');
        $empresa->telefone = $request->get('telefone');
        $empresa->endereco = $request->get('endereco');
        $empresa->cep = $request->get('cep');
        $empresa->cnpj = $request->get('cnpj');

        $empresa->save();
        return redirect('/empresa')->with('success', 'Dados da empresa atualizados com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
