<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Artigo;

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $artigos = $user->artigosCreated;

        return view('artigo.index', ['artigos' => $artigos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artigo = new Artigo;

        return view('artigo.create', ['artigo' => $artigo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $artigo = new Artigo;
        $artigo->name = $request->name;
        $artigo->texto = $request->texto;
        $artigo->status = 'CREATED';
        $artigo->id_user_creator = $user->id;
        $artigo->save();

        return redirect()->route('artigo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('artigo show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('artigo edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('artigo destroy');
    }

    public function pesquisarArtigos(){

        $artigos = Artigo::join('users', 'users.id', '=', 'artigo.id_user_creator')
            ->where('status', '=', 'PUBLISHED')
            ->select('artigo.*', 'users.name as autor')
            ->get();

        return view('artigo.listar_artigos_leitura', ['artigos' => $artigos]);
    }

    public function lerArtigo($id){

        $artigo = Artigo::join('users as user_autor', 'user_autor.id', '=', 'artigo.id_user_creator')
            ->join('users as user_revisor', 'user_revisor.id', '=', 'artigo.id_user_reviewer')
            ->where('artigo.id', '=', $id)
            ->where('status', '=', 'PUBLISHED')
            ->select('artigo.*', 'user_autor.name as autor', 'user_revisor.name as revisor')
            ->first();

        return view('artigo.ler_artigo', ['artigo' => $artigo]);
    }
}
