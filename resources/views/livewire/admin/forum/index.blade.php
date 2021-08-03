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
                    <x-table.cell>{{ $forum->title }}</x-table.cell>
                    <x-table.cell>{{ $forum->created_at->diffForHumans() }}</x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table.main>

</section>