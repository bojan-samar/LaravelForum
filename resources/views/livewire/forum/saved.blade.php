<section>

@forelse ($saves as $save)


    <div class="shadow rounded-lg p-4 bg-white mb-5">

        @include('forum._author', [ 'user' => $save['user'], 'created_at' => \Carbon\Carbon::create($save['created_at'])->diffForHumans() ])

        <div class="font-bold">
            <a href="{{ route('forum.show', $save['forum']['slug'] ) }}">
                <h2>{{ $save['forum']['title'] }}</h2>
            </a>
        </div>

        <div class="text-base">
            {{ $save['forum']['body'] }}
        </div>


        <div class="mt-5">
            <x-jet-secondary-button wire:click="save({{ $loop->index }})" size="md" class="mr-2">
                @if($save['saved'])
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
        </div>

    </div>

@empty

    <section class="shadow rounded-lg p-4 bg-white mb-5 text-center font-bold text-2xl">
        No Saved Posts
    </section>

@endforelse
</section>
