<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;

    protected $table = "categories";

    static public function model ($parent = false, $active = false) {

        $static = new static;

        if($active){
            $all = $static->where('active', 1)->get();
        }else{
            $all = $static->all();
        }

        $model = [];

        foreach ($all as $key => $value) {
            if($parent){
                if(empty($value->cate_id)){
                    $model[$key] = $value;
                    $children = $all->where('cate_id', $value->id)->all();
                    $model[$key]['children'] = $children;
                }
            }else{
                $model[$key] = $value;
                $children = $all->where('cate_id', $value->id)->all();
                $model[$key]['children'] = $children;
            }
        }

        return $model;

    }


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
