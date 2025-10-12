<?php

namespace Bura1\Commentions\Filament\Actions;

use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Bura1\Commentions\Filament\Concerns\HasMentionables;
use Bura1\Commentions\Filament\Concerns\HasPagination;
use Bura1\Commentions\Filament\Concerns\HasPolling;
use Bura1\Commentions\Filament\Concerns\HasSidebar;

class CommentsAction extends Action
{
    use HasMentionables;
    use HasPagination;
    use HasPolling;
    use HasSidebar;

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->icon('heroicon-o-chat-bubble-left-right')
            ->modalContent(fn (Model $record) => view('commentions::comments-modal', [
                'record' => $record,
                'mentionables' => $this->getMentionables(),
                'pollingInterval' => $this->getPollingInterval(),
                'paginate' => $this->isPaginated(),
                'perPage' => $this->getPerPage(),
                'loadMoreLabel' => $this->getLoadMoreLabel(),
                'perPageIncrement' => $this->getPerPageIncrement() ?: $this->getPerPage(),
                'sidebarEnabled' => $this->isSidebarEnabled(),
                'showSubscribers' => $this->showSubscribers(),
            ]))
            ->modalWidth($this->isSidebarEnabled() ? '4xl' : 'xl')
            ->label(__('commentions::comments.label'))
            ->modalSubmitAction(false)
            ->modalCancelAction(false)
            ->modalAutofocus(false);
    }

    public static function getDefaultName(): ?string
    {
        return 'comments';
    }
}
