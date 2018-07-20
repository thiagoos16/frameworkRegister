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
            return ProgrammingLanguage::create($request->all());
        } else {
            return Response('Was not possible to register language. Make sure this language name is not already registered!', 409);
        }
    }

    public function update(Request $request, $id) {
        if (is_null($this->existsLanguageName($request->name))) {
            ProgrammingLanguage::find($id)->update($request->all());
            return Response('Programming Language Updated with Success!', 200);
        } else {
            return Response('Was not possible to update language. Make sure this language name is not already registered!', 409);
        }
    }

    public function delete($id) {
        if ($this->existsLanguage($id)) {
            ProgrammingLanguage::find($id)->delete();
            return Response('Programming Language Deleted with Success!', 200);
        } else {
            return Response('Programming Language not Found.', 200); 
        }
    }

    public function findById($id) {
        if ($this->existsLanguage($id)) {
            return ProgrammingLanguage::find($id);
        } else {
            return Response('Programming Language not Found.', 200); 
        }
    }

    public function existsLanguageName($name) {
        return ProgrammingLanguage::where('name', $name)->first(); 
    }

    public function existsLanguage($id) {
        return ProgrammingLanguage::find($id); 
    }
}