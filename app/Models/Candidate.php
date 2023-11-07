<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function formals()
    {
        return $this->hasMany(Formal::class);
    }

    public function photogenics()
    {
        return $this->hasMany(Photogenic::class);
    }

    public function populars()
    {
        return $this->hasMany(Popular::class);
    }

    public function productions()
    {
        return $this->hasMany(Production::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function sports()
    {
        return $this->hasMany(Sport::class);
    }

    public function uniforms()
    {
        return $this->hasMany(Uniform::class);
    }
}
