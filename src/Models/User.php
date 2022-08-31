<?php

namespace Blog\Blog\Models;

use Pathshala\Auth\Models\User as AuthUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends AuthUser
{
    use HasFactory;

    public static function newFactory()
    {
        return \Blog\Blog\Database\Factories\UserFactory::new();
    }
}
