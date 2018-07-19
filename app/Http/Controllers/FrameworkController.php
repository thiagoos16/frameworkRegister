<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Framework;
use App\ProgrammingLanguage;

class FrameworkController extends Controller 
{
    public function index() {
        $frameworks_aux = Framework::all();
        $frameworks = [];

        foreach($frameworks_aux as $framework) {
            $language = $framework->programmingLanguage()->where('id', $framework->id_language)->first();
            
            $temp_framework = $framework;
            
            $temp_framework['language'] = $language->name;

            $frameworks[] = $temp_framework;
        }

        return $frameworks;
    }

    public function create(Request $request) {
        if (is_null($this->existsFrameworkName($request->name)) && 
            is_null($this->existsFrameworkSite($request->site)) && 
            !is_null($this->existsLanguage($request->id_language))) {
            Framework::create($request->all());
            return Response('Framework Registered with Success!', 201); 
        } else {
            return Response('Was not possible to register Framework. Make sure this Framework Name and Site is not already registered. Make sure the language exists in database.', 409);
        }
    }

    public function update(Request $request, $id) {
        if (!is_null($this->existsLanguage($request->id_language))) {
            Framework::find($id)->update($request->all());
            return Response('Framework Updated with Success!', 200); 
        } else {
            return Response('Was not possible to update Framework. Make sure this Framework Name and Site is not already registered. Make sure the language exists in database.', 409);
        }
    }

    public function delete($id) {
        if ($this->existsFramework($id)) {
            Framework::find($id)->delete();
            return Response('Framework Deleted with Success!', 200);
        } else {
            return Response('Framework not Found.', 200); 
        }
    }

    public function findById($id) {
        if ($this->existsFramework($id)) {
            $framework = Framework::find($id);
            $language = $framework->programmingLanguage()->where('id', $framework->id_language)->first();
            $framework['language'] = $language->name;
            return $framework;
        } else {
            return Response('Framework not Found.', 200); 
        }
    }

    public function existsFrameworkName($name) {
        return Framework::where('name', $name)->first();
    }

    public function existsFrameworkSite($site) {
        return Framework::where('site', $site)->first();
    }

    public function existsFramework($id) {
        return Framework::find($id);
    }

    public function existsLanguage($id_language) {
        return ProgrammingLanguage::find($id_language);
    }
}