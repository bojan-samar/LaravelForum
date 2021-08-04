<ul>

    <li>
        <a href="{{ route('admin.dashboard.index') }}"
           class="mb-1 px-2 py-2 rounded-lg flex items-center text-gray-700 hover:text-blue-600 hover:bg-blue-100 {{ request()->routeIs('admin.dashboard.*') ? 'bg-blue-100 text-white' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </a>
    </li>

        <li>
            <a href="{{ route('admin.forum.index') }}"
               class="mb-1 px-2 py-2 rounded-lg flex items-center text-gray-700 hover:text-blue-600 hover:bg-blue-100 {{ request()->routeIs('admin.forum.*') ? 'bg-blue-100 text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                Posts
            </a>
        </li>

        <li>
            <a href="{{ route('admin.comment.index') }}"
               class="mb-1 px-2 py-2 rounded-lg flex items-center text-gray-700 hover:text-blue-600 hover:bg-blue-100 {{ request()->routeIs('admin.comment.*') ? 'bg-blue-100 text-white' : '' }}">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
              </svg>
                Comments
            </a>
        </li>
</ul>
