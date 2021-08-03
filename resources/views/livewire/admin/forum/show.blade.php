<section>
    <x-jet-secondary-button class="mb-5" wire:click="$emitUp('back')" wire:loading.attr="disabled">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
        </svg>
        Back
    </x-jet-secondary-button>

    <div class="shadow rounded-lg p-4 bg-white">
        @include('forum._author', [ 'user' => $forum->user, 'created_at' => $forum->created_at->diffForHumans() ])

        <div class="mt-2 font-bold">
            <a href="{{ route('forum.show', $forum->slug) }}">
                <h2>{{ $forum->title }}</h2>
            </a>
        </div>
        <div class="text-base">
            {{ $forum->body }}
        </div>
        <div class="mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
            </svg>
            <span class="text-base">{{  $forum->comments->count() }}</span>
        </div>

        <div id="forum-action" class="mt-5 flex">
            
            <div id="forum-edit" class="mr-3">
                <x-jet-secondary-button size="md" wire:click="$set('editingForum', true)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </x-jet-secondary-button>


                <x-jet-dialog-modal wire:model="editingForum">
                    <x-slot name="title">
                        {{ __('Edit Forum') }}
                    </x-slot>

                    <x-slot name="content">


                        <form wire:submit.prevent="update">
                            <div class="mb-5">
                                <x-jet-label value="{{ __('Title') }}" />
                                <x-jet-input class="block mt-1 w-full" type="text" name="title" wire:model.defer="forum.title"/>
                                @error('forum.title')
                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <x-jet-label value="{{ __('Comment') }}" />
                                <x-resizable-textarea class="mt-1" wire:model.defer="forum.body"></x-resizable-textarea>
                                @error('forum.body')
                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('editingForum')" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-jet-secondary-button>

                        <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                            {{ __('Update') }}
                        </x-jet-button>
                    </x-slot>
                </x-jet-dialog-modal>

            </div>

            <div id="forum-delete">
                <x-jet-danger-button size="md" wire:click="$set('confirmingDeletion', true)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Delete
                </x-jet-danger-button>


                <x-jet-confirmation-modal wire:model="confirmingDeletion">

                    <x-slot name="title">
                        {{ __('Delete Your Post Below?') }}
                    </x-slot>

                    <x-slot name="content">
                        <b>{{ $forum->title }}</b>
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('confirmingDeletion')" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-2" wire:click="destroy" wire:loading.attr="disabled">
                            {{ __('Delete') }}
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-confirmation-modal>
            </div>

        </div>

    </div>
</section>
