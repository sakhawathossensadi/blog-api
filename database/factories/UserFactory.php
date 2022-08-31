<?php

namespace Blog\Blog\Database\Factories;

use Blog\Blog\Models\User;
use Pathshala\Auth\Database\Factories\UserFactory as FactoriesUserFactory;

class UserFactory extends FactoriesUserFactory
{
    protected $model = User::class;
}
