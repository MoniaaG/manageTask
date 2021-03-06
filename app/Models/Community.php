<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function creator() {
        return $this->hasOne(User::class);
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }
}
