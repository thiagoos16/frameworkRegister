<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Framework extends Model 
{
    protected $table = 'framework';

    protected $fillable = ['name', 'url_image', 'site', 'year_creation', 'creator', 
                            'latest_stable_release', 'type', 'opinion', 'pros_cons', 'id_language'];

    public function programmingLanguage() {
        return $this->belongTo('App\ProgrammingLanguage', 'id_language');
    }
}