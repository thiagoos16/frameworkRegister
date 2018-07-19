<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgrammingLanguage;

class ProgrammingLanguageController extends Controller 
{
    public function index() {
        return ProgrammingLanguage::all();
    }

    public function create(Request $request) {
        ProgrammingLanguage::create($request->all());

        return $request->all();
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
}