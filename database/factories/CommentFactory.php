<?php

namespace Bura1\Commentions\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Bura1\Commentions\Comment;
use Bura1\Commentions\Contracts\Commentable;
use Bura1\Commentions\Contracts\Commenter;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraph,
        ];
    }

    public function commentable(Commentable $commentable): self
    {
        return $this->state(fn (array $attributes) => [
            'commentable_type' => $commentable->getMorphClass(),
            'commentable_id' => $commentable->getKey(),
        ]);
    }

    public function author(Commenter $author): self
    {
        return $this->state(fn (array $attributes) => [
            'author_type' => $author->getMorphClass(),
            'author_id' => $author->getKey(),
        ]);
    }
}
