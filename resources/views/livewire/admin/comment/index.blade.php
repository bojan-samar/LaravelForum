<section>
    <h1 class="text-xl font-bold">Recent Comments</h1>

    <x-table.main>
        <x-slot name='heading'>
            <x-table.header>ID</x-table.header>
            <x-table.header>Comment</x-table.header>
            <x-table.header>Created At</x-table.header>

        </x-slot>

        <x-slot name='body'>
            @foreach($comments as $comment)
                <x-table.row class="cursor-pointer" wire:click="$emitUp('selectComment', {{ $comment->id }})">
                    <x-table.cell>{{ $comment->id }}</x-table.cell>
                    <x-table.cell>{{ \Illuminate\Support\Str::limit($comment->body, 185, '...') }}</x-table.cell>
                    <x-table.cell>{{ $comment->created_at->diffForHumans() }}</x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table.main>

</section>
