<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MainModel extends Model
{
    public static function loadid() {
        $urls = DB::table('links')->get();

        return $urls;
    }

    public static function saves(string $url, array $options = []) {
        $link = 'https://' .
            base_convert(rand(1111111111, 9999999999), 10, 36)
            . '.by/'.
            base_convert(rand(11111111111, 99999999999), 10, 36);

        DB::insert('INSERT links(link, linkShort)VALUES (\'' . $url . '\', \'' . $link . '\')');

        return json_encode([
            'link'    => $link,
            'url'     => $url,
            'success' => true
        ]);
    }
}
