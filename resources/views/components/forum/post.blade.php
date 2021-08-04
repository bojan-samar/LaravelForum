<section>
    <div id="user" class="flex items-center mb-2">
        <div>
            <a href="{{ route('forum.user', $user['uuid']) }}">
                <img class="h-12 w-12 rounded-full" src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }}">
            </a>
        </div>

        <div class="text-xs ml-3">
            <a href="{{ route('forum.user', $user['uuid']) }}">
                {{$user['alias']}}
            </a>
            <span class="text-gray-400"> | {{ $post->created_at->diffForHumans() }}</span>
        </div>
    </div>

    @isset ($post->title)
        <div id="post-title" class="mt-2 font-bold">
            <a href="{{ route('forum.show', $post->slug) }}">
                <h2>{{ $post->title }}</h2>
            </a>
        </div> 
    @endisset

    <div id="post-body" class="text-base">
        {{ $post->body }}
    </div>

    @isset ($post->comments)
        <div class="mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
            </svg>
            <span class="text-base">{{  $post->comments->count() }}</span>
        </div>
    @endisset

</section>