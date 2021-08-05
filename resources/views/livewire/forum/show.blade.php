<section>
    <div id="forum" class="bg-white pt-5 pb-12 px-4">

        <div class="mb-5 container">
            <x-forum.post :linked="false" :user="$forum['user']" :post="$forum"></x-forum.post>
        </div>


        <div class="mt-5 container flex items-center">
            @auth
                <a href="#new-comment">
                    <x-jet-secondary-button size="md" class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                        </svg>
                        Reply
                    </x-jet-secondary-button>
                </a>

                <x-jet-secondary-button wire:click="favorite" size="md" class="mr-2">
                    @if($forum->favorite)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill inline mr-1 text-red-600" viewBox="0 0 16 16">
                            <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
                        </svg>
                        Unsave
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                        Save
                    @endif
                </x-jet-secondary-button>


                @if ($forum->canEdit())

                    <x-jet-secondary-button size="md" wire:click="$set('confirmingDeletion', true)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete
                    </x-jet-secondary-button>


                    <x-jet-confirmation-modal wire:model="confirmingDeletion">

                        <x-slot name="title">
                            {{ __('Delete Your Post Below?') }}
                        </x-slot>

                        <x-slot name="content">
                            <b>{{ $forum ? $forum ->body : '' }}</b>
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

            @else
                <div class="text-base">
                    <a href="/login" class="text-blue-600">Log In</a> or <a href="/register" class="text-blue-600">Register</a> To Reply
                </div>
            @endauth
        </div>
    </div>

    <div class="px-4 container">
        @livewire('comment.comments', ['model' => $forum], key('comments'))
    </div>
</section>
