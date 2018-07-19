<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Framework;

class FrameworkController extends Controller 
{
    public function index() {
        return Framework::all();
    }

    public function create(Request $request) {
        Framework::create($request->all());

        return $request->all();
    }

    public function update(Request $request, $id) {
        Framework::find($id)->update($request->all());

        return Framework::find($id);
    }

    public function delete($id) {
        Framework::find($id)->delete();

        return Framework::all();
    }

    public function findById($id) {
        return Framework::find($id);
    }
}