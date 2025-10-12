<?php

namespace Tests\Policies;

use Bura1\Commentions\Comment;
use Bura1\Commentions\Contracts\Commenter;
use Bura1\Commentions\Policies\CommentPolicy;

class BlockedCommentPolicy extends CommentPolicy
{
    public function create(Commenter $user): bool
    {
        return false;
    }

    public function update($user, Comment $comment): bool
    {
        return false;
    }

    public function delete($user, Comment $comment): bool
    {
        return false;
    }
}
