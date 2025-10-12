@use('\Bura1\Commentions\Config')

<div class="comm:flex comm:gap-4 comm:h-full" x-data="{ wasFocused: false }">
    <div class="comm:flex-1 comm:space-y-2">
        <livewire:commentions::comment-list-custom
            :record="$record"
            :mentionables="$this->mentions"
            :polling-interval="$pollingInterval"
            :paginate="$paginate ?? true"
            :per-page="$perPage ?? 5"
            :load-more-label="$loadMoreLabel ?? 'Show more'"
            :per-page-increment="$perPageIncrement ?? null"
        />
    </div>
</div>
