<?php

namespace Blog\Blog\Tests\Features;

use Blog\Blog\Models\Blog;
use Blog\Blog\Tests\TestCase;

class BlogApiTest extends TestCase
{
    public function tests_blog_create()
    {
        $this->withExceptionHandling();

        $data = Blog::factory()->raw();

        $this->assertDatabaseCount((new Blog())->getTable(), 0);

        $response = $this->actingAs($this->user, 'api')
            ->postJson(route('store.post'), $data);

        $response->assertStatus(201);
        $response->assertJsonFragment([
            'title' => $data['title'],
            'category' => $data['category'],
        ]);

        $this->assertDatabaseCount((new Blog())->getTable(), 1);
    }
}
