<?php

namespace Bura1\Commentions\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Bura1\Commentions\Comment;

class CommentWasCreatedEvent
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public Comment $comment,
    ) {}
}
