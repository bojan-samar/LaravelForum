<section>
    <h1 class="text-xl font-bold">Recent Posts</h1>

    <x-table.main>
        <x-slot name='heading'>
            <x-table.header>ID</x-table.header>
            <x-table.header>Title</x-table.header>
            <x-table.header>Created At</x-table.header>

        </x-slot>

        <x-slot name='body'>
            @foreach($forums as $forum)
                <x-table.row class="cursor-pointer" wire:click="$emitUp('selectForum', {{ $forum->id }})">
                    <x-table.cell>{{ $forum->id }}</x-table.cell>
                    <x-table.cell>
                        {{ $forum->title }}
                        <div class="ml-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>{{ $forum->user->alias }}</span>
                        </div>
                    </x-table.cell>
                    <x-table.cell>{{ $forum->created_at->diffForHumans() }}</x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table.main>

</section>