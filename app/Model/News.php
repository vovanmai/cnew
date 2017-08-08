<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table='news';
    protected $primaryKey='nid';
    public $timestamps=false;
    
    public static function getItems(){
   		return DB::table('news as n')
                 ->join('cat as c','n.cid','=','c.cid')
                 ->select('n.*','c.name as cname')
                 ->orderBy('n.nid','DESC')
                 ->paginate(getenv('ROW_COUNT'));
   	}
    public function cat(){
        return $this->belongsto('App\Model\Category','cid');
    }


}
