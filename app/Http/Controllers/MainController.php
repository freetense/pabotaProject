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

        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $value = MainModel::saves($url);

            return $value;
        } else {

            return json_encode(['success' => false]);
        }
    }
}
