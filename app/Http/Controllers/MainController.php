<?php

namespace App\Http\Controllers;

use App\Models\MainModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home() {
        $urls = MainModel::loadid();

        return view('home', ['urls' => $urls]);
    }

    public function save(Request $request) {
        $url = $request->name;
        if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
            $value = MainModel::saves($url);

            return $value;
        } else {

            return json_encode(['success' => false]);
        }
    }
}
