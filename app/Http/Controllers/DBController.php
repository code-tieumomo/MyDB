<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBController extends Controller
{
    public function show($dbName)
    {
        $listDB = DB::select(DB::raw('SHOW DATABASES'));
        $user = DB::select('SELECT USER() AS `user`')[0]->user;
        $isExists = DB::select(DB::raw('SHOW DATABASES LIKE "' . $dbName . '"'));
        if (count($isExists) == 0) abort(404);

        $res = DB::select('SELECT * FROM `information_schema`.`TABLES` WHERE `TABLE_SCHEMA` = "' . $dbName . '"');

        return view('db', compact([
            'listDB',
            'user',
            'dbName',
            'res'
        ]));
    }
}
