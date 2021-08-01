<div class="flex items-center mb-2">
    <div>
        <a href="{{ route('forum.user', $user['uuid']) }}">
            <img class="h-16 w-16 rounded-full" src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }}">
        </a>
    </div>
    <div class="text-xs ml-3">
        <a href="{{ route('forum.user', $user['uuid']) }}">
            {{$user['forum_user_alias']}}
        </a>
        <span class="text-gray-400"> | {{ $created_at }}</span>
    </div>
</div>
