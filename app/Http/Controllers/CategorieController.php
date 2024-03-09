<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

    public function index(){

    }

    public function create(CategorieRequest $request)
    {
        $validatedData = $request->validate($request->rules());

        Categorie::create([
            'name' => $validatedData['name']
        ]);

        return redirect()->back();
    }


    public function update(Request $request, Categorie $id)
    {
        $validate = $request->validate([
            'categoryname' => 'required'
        ]);
        $id->update([
            'name' => $validate['categoryname']
        ]);

        return redirect()->back();
    }


    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->back();
    }
}
