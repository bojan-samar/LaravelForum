<div class="md:hidden">
    <div @click="sidemenu = false"
        class="fixed inset-0 z-30 bg-gray-600 opacity-0 pointer-events-none transition-opacity ease-linear duration-300"
        :class="{'opacity-75 pointer-events-auto': sidemenu, 'opacity-0 pointer-events-none': !sidemenu}"></div>

    <!-- Small Screen Menu -->
    <div class="fixed inset-y-0 left-0 flex flex-col z-40 max-w-xs w-full bg-white transform ease-in-out duration-300 -translate-x-full"
        :class="{'translate-x-0': sidemenu, '-translate-x-full': !sidemenu}">

        <!-- Brand Logo / Name -->
        <div class="flex items-center px-6 py-3 h-16">
            <div class="text-2xl font-bold tracking-tight text-gray-800">
                <a href="/">Dashing Admin.</a>
            </div>
        </div>
        <!-- @end Brand Logo / Name -->


        <div class="px-4 py-2 flex-1 h-0 overflow-y-auto">
            @include('admin.layout.sidebar-links')
        </div>

    </div>
    <!-- @end Small Screen Menu -->
</div>



<!-- Menu Above Medium Screen -->
<div class="bg-white w-64 min-h-screen overflow-y-auto hidden md:block relative z-30">

    <!-- Brand Logo / Name -->
    <div class="flex items-center px-6 py-3 h-16">
        <div class="text-2xl font-bold tracking-tight text-gray-800">
            <a href="/">Home</a>
        </div>
    </div>
    <!-- @end Brand Logo / Name -->

    <div class="px-4 py-2">

        @include('admin.layout.sidebar-links')

    </div>
</div>
<!-- @end Menu Above Medium Screen -->
