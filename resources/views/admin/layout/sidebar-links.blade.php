<ul>
    @if(request()->user()->hasRole('superadmin'))
        <li>
            <a href="{{ route('admin.forum.index') }}"
               class="mb-1 px-2 py-2 rounded-lg flex items-center text-gray-700 hover:text-blue-600 hover:bg-blue-100 {{ request()->routeIs('admin.forum.*') ? 'bg-blue-100 text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                Posts
            </a>
        </li>

        <li>
            <a href="{{ route('admin.comment.index') }}"
               class="mb-1 px-2 py-2 rounded-lg flex items-center text-gray-700 hover:text-blue-600 hover:bg-blue-100 {{ request()->routeIs('admin.comment.*') ? 'bg-blue-100 text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                Comments
            </a>
        </li>
    @endif
</ul>
