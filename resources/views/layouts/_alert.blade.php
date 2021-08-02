@if (Session::has('success'))
    <div id="alert-box" onclick="document.querySelector('#alert-box').remove()" class="shadow p-3 text-sm z-50 bg-green-500 text-green-200 flex justify-between">
        <div>{{ session('success') }}</div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
@endif

@if (Session::has('warning'))
    <div id="alert-box" onclick="document.querySelector('#alert-box').remove()" class="shadow p-3 text-sm z-50 bg-yellow-500 text-yellow-200 flex justify-between">
        <div>{{ session('warning') }}</div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div id="alert-box" onclick="document.querySelector('#alert-box').remove()" class="shadow p-3 text-sm z-50 bg-red-500 text-red-200 flex justify-between">
        <div>{{ session('error') }}</div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
@endif



@if (count($errors) > 0)
    <div id="alert-box" class="shadow p-3 text-sm z-50 bg-red-500 text-red-200">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



