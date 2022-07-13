<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traiteur extends Model
{
    use HasFactory;
    protected $fillable = ['nameEntreprise', 'phoneNumber', 'email',];
}
