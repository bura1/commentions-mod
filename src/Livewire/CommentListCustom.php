<?php

namespace Bura1\Commentions\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Bura1\Commentions\Livewire\Concerns\HasMentions;
use Bura1\Commentions\Livewire\Concerns\HasPagination;
use Bura1\Commentions\Livewire\Concerns\HasPolling;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentListCustom extends Component
{
    use HasMentions;
    use HasPagination;
    use HasPolling;

    public Model $record;

    public function render()
    {
        return view('commentions::comment-list-custom');
    }

    #[Computed]
    public function comments(): Collection
    {
        return $this->record->getComments($this->paginate ? $this->perPage : null);
    }

    #[On('comment:saved')]
    #[On('comment:updated')]
    #[On('comment:deleted')]
    public function reloadComments(): void
    {
        unset($this->comments);
    }
}
