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

    //Owner - Nome do resposável do grupo do grupo
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public function users()
    {
        //Relacionamento N para N. N:N
        return $this->belongsToMany(User::class, 'user_groups');
    }

    public function institution()
    {
    	return $this->belongsTo(Institution::class);
    }
}
