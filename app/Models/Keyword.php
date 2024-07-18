<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;

    public $table = 'keywords';

    static public function getNameSlug ($id) {
        $static = new static;
        $keyword = $static::find($id);
        if(empty($keyword)) return [
            'name' => '',
            'slug' => '',
        ];
        return [
            'name' => $keyword->name,
            'slug' => $keyword->slug,
        ];
    }


}
