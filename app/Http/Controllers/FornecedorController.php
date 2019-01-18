<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendVerificationEmail;

class FornecedorController extends Controller
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

        if (DB::table('empresas')->where('user_id', '=', $user_id)->count() > 0) {
            $fornecedores = DB::table('fornecedores')->where('user_id', '=', $user_id)->get();
            return view('fornecedores.index', compact('fornecedores'));
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
        return view('fornecedores.create');
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
            'email' => ['required', 'string', 'email', 'unique:fornecedores'],
            'mensalidade' => ['required', 'numeric']
        ]);

        $fornecedor = new Fornecedor([
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'mensalidade' => $request->get('mensalidade'),
            'user_id' => $user_id
        ]);

        $fornecedor->save();
        return redirect('/fornecedores')->with('success', 'Obrigado por concluir seu cadastro, agora você já pode cadastrar seus fornecedore.');
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
        $fornecedor = Fornecedor::find($id);
        return view('fornecedores.edit', compact('fornecedor'));
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
            'mensalidade' => ['required', 'numeric']
        ]);

        $fornecedor = Fornecedor::find($id);
        $fornecedor->nome = $request->get('nome');
        $fornecedor->mensalidade = $request->get('mensalidade');


        $fornecedor->save();
        return redirect('/fornecedores')->with('success', 'Dados da empresa atualizados com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->delete();

        return redirect('/fornecedores')->with('success', 'Fornecedor excluido com sucesso.');
    }

    public function somarMensalidades()
    {
        $user_id = Auth::id();
        $total = DB::table('fornecedores')
            ->select('mensalidade')
            ->where('user_id', '=', $user_id)
            ->sum('mensalidade');
        return view('fornecedores.mensalidades', compact('total'));
    }
}
