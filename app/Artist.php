<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Artist extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $table = 'artists';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public $timestamps = true;

    protected $hidden = [];

    public function genres() {
        return $this->belongsToMany(Genre::class, 'artists_genres', 'artist_id');
    }

    public function pieces() {
        return $this->hasMany(Piece::class, 'artist_id', 'id');
    }
}
