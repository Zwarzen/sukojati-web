<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Halaman extends Model
{
    use HasFactory;

    public $table = 'halaman';

    protected $fillable = [
        'id',
        'nama',
        'slug',
        'is_statis',
        'keterangan',
        'wallpaper',
        'is_private',
        'parent_id',
        'isi',
        'url',
        'urutan',
        'icon',
        'creatorid',
        'createdby',
        'modifiedby',
        'modifierid',
        'created_at',
        'update_at'
    ];

    function getList($where=null){

        $pages = DB::table($this->table);

        if($where){
            $pages->where($where);
        }else{
            $pages->where('published','yes');


        }

        $raw  =  $pages->orderBy('created_at','DESC');


        // $sortedByParent = $this->sortByParent($raw,0);

        return $raw;

    }


    function getForPaginated(){

        // dd($unor);

        $pages = DB::table($this->table);


        return $pages;

    }

    function getHaveSortedPage($unor){

        // dd($unor);

        $pages = DB::table($this->table);

        if($unor){


            $pages->where("unor",$unor);
        }


        $pages->where('published','yes');
        $raw  =  $pages->orderBy('urutan','ASC')
        ->get();


        $sortedByParent = $this->sortByParent($raw,0);

        return $sortedByParent;

    }


    function sortByParent($dtMenuMain,$p) {
        $r = array();
        foreach($dtMenuMain as $row) {
        if ($row->parent_id ==$p) {
            $row->child = $this->sortByParent($dtMenuMain,$row->id);
            $r[$row->id] = $row;
        }
        }
        return $r;
    }




}
