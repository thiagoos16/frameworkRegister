<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model 
{
    protected $table = 'programming_language';

    protected $fillable = ['name'];
}