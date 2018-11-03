<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Piece extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $table = 'pieces';

    protected $primaryKey = 'id';

    protected $fillable = ['artist_id', 'genre_id', 'title', 'type', 'hasVideoId'];

    public $timestamps = true;

    protected $hidden = [];

    public function artist() {
        return $this->belongsTo(Artist::class, 'artist_id', 'id');
    }

    public function genre() {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }
}
