<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function show($dbName, $tableName)
    {
        $isExists = DB::select(DB::raw('SELECT COUNT(*) AS `count` FROM `information_schema`.`TABLES` WHERE (`TABLE_SCHEMA` = "' . $dbName . '") AND (`TABLE_NAME` = "' . $tableName . '")'))[0]->count;
        if ($isExists == 0) abort(404);

        $listDB = DB::select(DB::raw('SHOW DATABASES'));
        $user = DB::select('SELECT USER() AS `user`')[0]->user;

        $cols = DB::select('SELECT * FROM `information_schema`.`COLUMNS` WHERE `TABLE_SCHEMA` = "' . $dbName . '" AND `TABLE_NAME` = "' . $tableName . '" ORDER BY ORDINAL_POSITION ASC');
        $mainSQL = 'SELECT * FROM `' . $dbName . '`.`' . $tableName . '` LIMIT 100';
        $start = microtime(true);
        $res = DB::select($mainSQL);
        $duration = microtime(true) - $start;

        return view('table', compact([
            'listDB',
            'user',
            'dbName',
            'tableName',
            'cols',
            'res',
            'mainSQL',
            'duration'
        ]));
    }

    public function structure($dbName, $tableName)
    {
        $isExists = DB::select(DB::raw('SELECT COUNT(*) AS `count` FROM `information_schema`.`TABLES` WHERE (`TABLE_SCHEMA` = "' . $dbName . '") AND (`TABLE_NAME` = "' . $tableName . '")'))[0]->count;
        if ($isExists == 0) abort(404);

        $listDB = DB::select(DB::raw('SHOW DATABASES'));
        $user = DB::select('SELECT USER() AS `user`')[0]->user;

        $mainSQL = 'SELECT * FROM `information_schema`.`COLUMNS` where `TABLE_SCHEMA` = "' . $dbName . '" AND `TABLE_NAME` = "' . $tableName . '" ORDER BY ORDINAL_POSITION ASC';
        $res = DB::select($mainSQL);
        $indexes = DB::select('SELECT * FROM `information_schema`.`STATISTICS` WHERE `TABLE_SCHEMA` = "' . $dbName . '" and `TABLE_NAME` = "' . $tableName . '"');
        $info = DB::select('SELECT * FROM `information_schema`.`TABLES` WHERE `TABLE_SCHEMA` = "' . $dbName . '" AND `TABLE_NAME` = "' . $tableName . '"')[0];

        return view('table-structure', compact([
            'listDB',
            'user',
            'dbName',
            'tableName',
            'res',
            'indexes',
            'info'
        ]));
    }
}
