<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fullName()
    {
        return $this->firstname . ' ' . $this->lastname;
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
        return $this->hasMany(Sports::class);
    }

    public function uniforms()
    {
        return $this->hasMany(Uniform::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
