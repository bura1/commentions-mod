<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <livewire:commentions::comments
        :mentionables="$getMentionables()"
        :showCommentList="false"
        :showMainActionButtons="false"
        :isCreateMode="true"
    />

    <input
        type="hidden"
        id="commentions-value-on-create"
        wire:model.defer="{{ $getStatePath() }}"
    >
</x-dynamic-component>
