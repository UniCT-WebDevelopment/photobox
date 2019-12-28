<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'descrizione', 'dataCaricamento', 'idUtente', 'like', 'unlike',
    ];

    public function setLike($likeCounter)
    {
        $this->attributes['like'] = $likeCounter;
    }

    public function setUnlike($unlikeCounter)
    {
        $this->attributes['unlike'] = $unlikeCounter;
    }

    /**
     * Get the users for the photo
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'idUtente');
    }

    /**
     * Get the voti for the photo
     */
    public function voti()
    {
        return $this->hasMany('App\Voto', 'idPhoto');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($photo) {
            $photo->voti()->delete();
        });
    }

}