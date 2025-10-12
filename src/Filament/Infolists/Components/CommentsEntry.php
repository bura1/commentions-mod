<?php

namespace Bura1\Commentions\Filament\Infolists\Components;

use Filament\Infolists\Components\Entry;
use Bura1\Commentions\Filament\Concerns\HasMentionables;
use Bura1\Commentions\Filament\Concerns\HasPagination;
use Bura1\Commentions\Filament\Concerns\HasPolling;

class CommentsEntry extends Entry
{
    use HasMentionables;
    use HasPagination;
    use HasPolling;

    protected string $view = 'commentions::filament.infolists.components.comments-entry';
}
