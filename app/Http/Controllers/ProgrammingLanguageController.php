<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\ProgrammingLanguage;

class ProgrammingLanguageController extends Controller 
{
    public function index() {
        return ProgrammingLanguage::all();
    }

    public function create(Request $request) {
        if (is_null($this->existsLanguageName($request->name))) {
            ProgrammingLanguage::create($request->all());
            return Response('Programming Language Registered with Success!', 200); 
        } else {
            return Response('Make sure the name is already in the language already registered!', 409);
        }
    }

    public function update(Request $request, $id) {
        ProgrammingLanguage::find($id)->update($request->all());

        return ProgrammingLanguage::find($id);
    }

    public function delete($id) {
        ProgrammingLanguage::find($id)->delete();

        return ProgrammingLanguage::all();
    }

    public function findById($id) {
        return ProgrammingLanguage::find($id);
    }

    public function existsLanguageName($name) {
        return ProgrammingLanguage::where('name', $name)->first(); 
    }
}