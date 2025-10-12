<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <livewire:commentions::comments-only-list
        :record="$getRecord()"
        :mentionables="$getMentionables()"
        :polling-interval="$getPollingInterval()"
        :paginate="$isPaginated()"
        :per-page="$getPerPage()"
        :load-more-label="$getLoadMoreLabel()"
        :per-page-increment="$getPerPageIncrement()"
    />
</x-dynamic-component>
