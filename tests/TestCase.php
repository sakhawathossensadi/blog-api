<?php

namespace Blog\Blog\Tests;

use Blog\Blog\Models\User;
use Blog\Blog\ServiceProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\PassportServiceProvider;
use Spatie\Activitylog\ActivitylogServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    use WithFaker;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations();
        $this->artisan('migrate')->run();

        $user = User::factory()->create();
        $this->user = $user;
    }

    protected function getEnvironmentSetUp($app)
    {
        $guards = $app['config']->get('auth.guards');

        $guards['api'] = [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ];

        $app['config']->set('auth.guards', $guards);

        $app['config']->set('auth.defaults.guard', 'api');

        $app['config']->set('auth.providers.users.model', User::class);

        $dbConfig = $app['config']->get('database.connections.sqlite');

        $app['config']->set('database.connections.mysql', $dbConfig);
    }

    protected function getPackageProviders($app)
    {
        return [
            'Pathshala\\Auth\\ServiceProvider',
            'Pathshala\\Auth\\AuthServiceProvider',
            ActivitylogServiceProvider::class,
            PassportServiceProvider::class,
            ServiceProvider::class,
        ];
    }
}
