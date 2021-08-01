<x-app-layout>
    <style>
        body {
            background: #f3f4f6 !important;
        }
    </style>

    <section class="container max-w-xl pt-8">
        <div class="flex items-center">
            <div class="p-4">
                <img style="max-height: 10rem" class="rounded-full" src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }}">
            </div>
            <div class="p-4">
                <div><b>Name:</b> {{ $user->forum_user_alias }}</div>
                <div><b>Posts: </b> {{ $user->forums->count() }}</div>
            </div>
        </div>
    </section>


    <section class="max-w-3xl mx-auto py-5">
        <h2 class="font-black text-3xl mb-5 text-center">Latest Posts</h2>
        @forelse ($user->forums as $forum)
            <div class="shadow rounded-lg p-4 bg-white mb-5">

                <div class="mt-5 font-bold">
                    <a href="{{ route('forum.show', $forum->slug) }}">
                        <h2>{{ $forum->title }}</h2>
                    </a>
                </div>
                <div class="text-base">
                    {{ $forum->body }}
                </div>

                <div class="mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                    <span class="text-base">{{  $forum->comments->count() }}</span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-base">{{ $forum->created_at->diffForHumans() }}</span>
                </div>

            </div>

        @empty

            <div class="shadow rounded-lg p-4 bg-white mb-5 text-center font-bold text-2xl">
                No Posts
            </div>

        @endforelse
    </section>

</x-app-layout>
