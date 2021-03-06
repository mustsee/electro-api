<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Genre extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $table = 'genres';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public $timestamps = true;

    protected $hidden = [];

    public function artists() {
        return $this->belongsToMany(Artist::class, 'artists_genres', 'genre_id');
    }

    public function pieces() {
        return $this->hasMany(Piece::class, 'genre_id', 'id');
    }
}
