<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasBranch extends Model
{
    use HasFactory;
    protected $table = 'user_branches';
    public $timestamps = false;
}
