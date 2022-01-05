<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Artigo;

class ArtigoManageController extends Controller
{
    public function __construct(){

        $this->middleware('permission:artigo-reviewer');
    }

    public function listArtigosRevisar(){

        $user = auth()->user();

        $artigos = Artigo::where('status', '=', 'CREATED')
            ->get();

        return view('artigo.listar_artigos_para_revisar', ['artigos' => $artigos]);
    }

    public function listArtigosRevisados(){

        $user = auth()->user();

        $artigos = $user->artigosReviewed;

        return view('artigo.listar_artigos_revisados', ['artigos' => $artigos]);
    }

    public function revisarArtigo($id){

        $artigo = Artigo::where('id', '=', $id)
            ->where('status', '=', 'CREATED')
            ->first();

        return view('artigo.revisar_artigo', ['artigo' => $artigo]);
    }

    public function aceitarArtigo(Request $request, $id){

        $user = auth()->user();

        $artigo = Artigo::find($id);
        $artigo->texto = $request->texto;
        $artigo->status = 'PUBLISHED';
        $artigo->id_user_reviewer = $user->id;
        $artigo->save();

        return redirect()->route('listar_artigos_revisao');
    }

    public function recusarArtigo(Request $request, $id){

        $user = auth()->user();

        $artigo = Artigo::find($id);
        $artigo->status = 'REJECTED';
        $artigo->id_user_reviewer = $user->id;
        $artigo->save();

        return redirect()->route('listar_artigos_revisao');
    }
}
