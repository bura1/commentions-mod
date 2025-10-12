<?php

namespace Bura1\Commentions\Policies;

use Bura1\Commentions\Comment;
use Bura1\Commentions\Contracts\Commenter;

class CommentPolicy
{
    public function create(Commenter $user): bool
    {
        return true;
    }

    public function update($user, Comment $comment): bool
    {
        return $comment->isAuthor($user);
    }

    public function delete($user, Comment $comment): bool
    {
        return $comment->isAuthor($user);
    }
}
