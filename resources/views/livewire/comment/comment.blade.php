@if ($comment)
<div class="mb-5">

    @include('forum._author', ['user' => $comment['user'], 'created_at' => $comment->created_at->diffForHumans()])

    @if($isEditing)
        <div class="max-w-2xl mt-2">
            <form wire:submit.prevent="postEdit">
                        <textarea type="text"
                                  wire:model.defer="editState.body"
                                  class="form-input block w-full @error('editState.body') border-red-500 @enderror"
                                  name="reply"
                                  rows="5">
                        </textarea>

                @error('editState.body')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror

                <div>
                    <x-jet-danger-button wire:click.prevent="$toggle('isEditing')">
                        Cancel
                    </x-jet-danger-button>

                    <x-jet-button class="mt-3">
                        Submit
                    </x-jet-button>
                </div>


            </form>
        </div>
    @else
        <div class="text-base">
            {{ $comment->body }}
        </div>
    @endif


    @auth()
        <div class="mt-5">

            @if(!$isReplying and !$isEditing)

                @if(!$comment->parent_id)

                    <x-jet-secondary-button size="md" wire:click="$toggle('isReplying')" class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                        </svg>
                        Reply
                    </x-jet-secondary-button>

                @endif

                @if ($comment->canEdit())

                    <x-jet-secondary-button wire:click="$toggle('isEditing')" size="md" class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </x-jet-secondary-button>

                    <x-jet-secondary-button size="md" wire:click="$set('confirmingDeletion', true)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete
                    </x-jet-secondary-button>


                    <x-jet-confirmation-modal wire:model="confirmingDeletion">

                        <x-slot name="title">
                            {{ __('Delete Your Comment Below?') }}
                        </x-slot>

                        <x-slot name="content">
                            <b>{{ $comment ? $comment ->body : '' }}</b>
                        </x-slot>

                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="$toggle('confirmingDeletion')" wire:loading.attr="disabled">
                                {{ __('Nevermind') }}
                            </x-jet-secondary-button>

                            <x-jet-danger-button class="ml-2" wire:click="destroy" wire:loading.attr="disabled">
                                {{ __('Delete') }}
                            </x-jet-danger-button>
                        </x-slot>
                    </x-jet-confirmation-modal>

                @endif

            @endif

            @if ($isReplying)
                <div class="max-w-2xl mt-2">
                    <form wire:submit.prevent="postReply">
                        <textarea id="reply" type="text"
                            wire:model.defer="replyState.body"
                            class="form-input w-full block @error('replyState.body') border-red-500 @enderror"
                            name="reply"
                            rows="5">
                        </textarea>

                        @error('replyState.body')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror

                        <div>
                            <x-jet-danger-button wire:click.prevent="$toggle('isReplying')">
                                Cancel
                            </x-jet-danger-button>

                            <x-jet-button class="mt-3">
                                Submit
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            @endif


        </div>

    @endauth

</div>

@endif
