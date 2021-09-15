<?php

namespace App\Zuri;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Helpers\ZuriInterface;

class Room
{
    protected $fillable = [
        'room_name',
        'creator_id',
        'visibility',
        'creation_date',
        'plugin_id',
        'organisation_id'
    ];


    private static $collection = 'Room';
    protected static $apiBase = "https://dm.zuri.chat/api/v1/";


    // rewrite model creation to zuri api endpoint
    public static function create ($data){
        $url = static::$apiBase . "createroom";
        $res = ZuriInterface::post($data, $url );
        return $res;
    }


    // rewrite model saving to zuri api endpoint
    public static function save ($id, $data){
        return;
    }

    // rewrite model find to zuri api endpoint
    public static function find ($id){
        $collection = static::$collection;
        $object_id = $id;
        $res = ReadWrite::read($collection, null, $object_id);
        return $res;
    }

    // rewrite model all to zuri api endpoint
    public static function all (){
        $collection = static::$collection;
        $res = ReadWrite::read($collection);
        return $res;
    }


    // rewrite model _firstOrCreate to zuri api endpoint
    public static function firstOrCreate ($data){
        return;
    }

    // rewrite model _firstOrCreate to zuri api endpoint
    public static function where ($query){
        $collection = static::$collection;
        $filter = $id;
        $res = ReadWrite::read($collection, $filter, null);
        return $res;
    }

    // rewrite model _firstOrCreate to zuri api endpoint
    public static function delete ($id){
        return;
    }

}
