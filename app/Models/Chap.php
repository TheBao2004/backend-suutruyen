<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chap extends Model
{
    use HasFactory;

    protected $table = 'chaps';

    public function comic(){
        return $this->belongsTo(
            Comic::class,
            'comic_id',
            'id'
        );
    }

    static public function count ($id) {
        $static = new static;
       return $static->where('comic_id', $id)->count();
    }

    static public function listShow ($id, $pg = true, $count = 20) {
        $static = new static;
        if($pg) return $static->where('comic_id', $id)->where('active', 1)->orderBy('stt', 'asc')->paginate($count);
        return $static->where('comic_id', $id)->where('active', 1)->orderBy('stt', 'asc')->get();
    }

}
