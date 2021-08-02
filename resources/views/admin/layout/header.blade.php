<div class="px-4 md:px-8 py-2 h-16 flex justify-between items-center">
    <div class="flex items-center w-2/3">
        <div class="p-2 rounded-full hover:bg-gray-200 cursor-pointer md:hidden"
            @click="sidemenu = !sidemenu">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <line x1="4" y1="6" x2="20" y2="6" />
                <line x1="4" y1="12" x2="20" y2="12" />
                <line x1="4" y1="18" x2="20" y2="18" />
            </svg>
        </div>
        {{-- <div class="text-xl font-bold tracking-tight text-gray-800 md:hidden ml-2">Dashing Adminnnn.</div> --}}
    </div>

    @include('navigation-menu-dropdown')
</div>
