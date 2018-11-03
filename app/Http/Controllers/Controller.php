<?php

namespace App\Http\Controllers;

use App\Genre;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function showPieces () {
        return response()->json(Genre::all('name'), 200);
    }
}
