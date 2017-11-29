<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Group extends Model implements Transformable
{
    use softDeletes;
    use TransformableTrait;

    protected $fillable = ['name', 'user_id', 'institution_id'];

    //Usuário lider do grupo
    public function owner() 
    {
    	return $this->belongsTo(User::class);
    }

    public function institution()
    {
    	return $this->belongsTo(Institution::class);
    }
}
