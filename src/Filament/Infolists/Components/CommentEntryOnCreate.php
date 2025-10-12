<?php

namespace Bura1\Commentions\Filament\Infolists\Components;

use Filament\Forms\Components\Field;
use Filament\Infolists\Components\Entry;
use Bura1\Commentions\Filament\Concerns\HasMentionables;
use Bura1\Commentions\Filament\Concerns\HasPagination;
use Bura1\Commentions\Filament\Concerns\HasPolling;

class CommentEntryOnCreate extends Field
{
    use HasMentionables;
    use HasPagination;
    use HasPolling;

    protected string $view = 'commentions::filament.infolists.components.comment-on-create';
}
