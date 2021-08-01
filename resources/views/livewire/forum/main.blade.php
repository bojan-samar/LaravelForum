<section>
    @switch($step)

        @case('create')
            @livewire('forum.create', key('create'))
            @break

        @default
            <section class="container py-12 max-w-3xl mx-auto">
                <div class="text-right mb-5">
                    <a href="/forum-saved">
                        <x-jet-secondary-button class="mr-2 relative">
                            Saved Posts
                        </x-jet-secondary-button></a>
                    <x-jet-button wire:click="$set('step', 'create')" wire:loading.attr="disabled">
                        New Post
                    </x-jet-button>
                </div>
                @livewire('forum.index', key('index'))
            </section>

    @endswitch
</section>
