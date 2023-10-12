<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Member extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function order()
    {
        return $this->hasMany(Member::class);
    }
}
