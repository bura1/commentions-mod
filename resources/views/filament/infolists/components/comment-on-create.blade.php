<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <livewire:commentions::comment-create
        :mentionables="$getMentionables()"
        wire:model.defer="{{ $getStatePath() }}"
    />
</x-dynamic-component>
