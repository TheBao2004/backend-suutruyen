<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    public $table = 'comics';

    public function chaps(){

        return $this->HasMany(
            Chap::class,
            'comic_id',
            'id'
        );

    }

}
