<?php

namespace App\Http\Controllers;

use PDO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $listDB = DB::select(DB::raw('SHOW DATABASES'));
        $user = DB::select('SELECT USER() AS `user`')[0]->user;
        $infoRaw = DB::select('SHOW VARIABLES');
        $info = new \stdClass();
        foreach ($infoRaw as $row) {
            $info->{$row->Variable_name} = $row->Value;
        }
        $pdo = DB::connection()->getPdo();

        return view('dashboard', compact([
            'listDB',
            'user',
            'info',
            'pdo'
        ]));
    }

    public function changeLanguage($language)
    {
        Session::put('language', $language);

        return redirect()->back();
    }
}
