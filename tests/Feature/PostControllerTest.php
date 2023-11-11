<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\Comment;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_method_displays_post_with_comments()
    {
        // Create a post and associated comments in the database
        $post = Post::factory()->create();
        $comments = Comment::factory()->count(3)->create(['post_id' => $post->id]);

        // Visit the show route for the post
        $response = $this->get(route('posts.show', $post));

        // Assert that the response contains the post title
        $response->assertSee($post->title);

        // Assert that the response contains the comments
        foreach ($comments as $comment) {
            $response->assertSee($comment->content);
        }
    }
}
