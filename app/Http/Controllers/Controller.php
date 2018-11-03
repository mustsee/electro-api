<?php

namespace App\Http\Controllers;

use App\Piece;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function showPieces()
    {
        return response()->json(Piece::with(['artist', 'genre'])->get(), 200);
    }

    public function test()
    {

    }
}
