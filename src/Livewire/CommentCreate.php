<?php

namespace Bura1\Commentions\Livewire;

use Illuminate\Database\Eloquent\Model;
use Bura1\Commentions\Actions\SaveComment;
use Bura1\Commentions\Config;
use Bura1\Commentions\Livewire\Concerns\HasMentions;
use Bura1\Commentions\Livewire\Concerns\HasPagination;
use Bura1\Commentions\Livewire\Concerns\HasPolling;
use Bura1\Commentions\Livewire\Concerns\HasSidebar;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class CommentCreate extends Component
{
    use HasMentions;
    use HasPagination;
    use HasPolling;
    use HasSidebar;

    public string $commentBody = '';

    #[Modelable]
    public $value = '123';

    protected $rules = [
        'commentBody' => 'required|string',
    ];

    public function render()
    {
        return view('commentions::comment-create');
    }

    #[On('body:updated')]
    #[Renderless]
    public function updateCommentBodyContent($value): void
    {
        dd($this->commentBody);
    }
}
