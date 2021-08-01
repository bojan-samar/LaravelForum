<section>
    <div id="auto-delete-search" class="md:max-w-lg mx-auto mb-8">
        <form
            class="rounded-lg overflow-hidden flex border">
            <input wire:model.debounce.500ms="search" type=" text" name="search"
                class="leading-snug shadow block w-full appearance-none bg-white text-sm text-gray-600 py-3 outline-none focus:outline-none px-4"
                placeholder="Search...">
            <button type="submit"
                class="inline-flex px-3 items-center text-sm border border-transparent font-semibold tracking-widest bg-gray-300 hover:bg-gray-400 active:bg-gray-400 focus:outline-none focus:border-gray-400 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Search</button>
        </form>
    </div>

    @forelse ($forums as $forum)

        <div class="shadow rounded-lg p-4 bg-white mb-5">

            @include('forum._author', [ 'user' => $forum['user'], 'created_at' => $forum->created_at->diffForHumans() ])

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

        </div>

    @empty

        <div class="shadow rounded-lg p-4 bg-white mb-5 text-center font-bold text-2xl">
            No Posts
        </div>

    @endforelse
</section>
