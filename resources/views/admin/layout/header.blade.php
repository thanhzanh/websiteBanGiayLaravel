<header class="ml-[345px] flex justify-between p-4 shadow-md fixed left-0 right-0 top-0 z-[999] bg-white">
    <div for="" class="items-center h-[100%] text-[1.5rem]">
        <span class="text-[1.7rem]"><i class="fa-solid fa-bars"></i></span>
        Dashboard
    </div>

    <div class="user-wrapper flex items-center">
        @if(session('infoAdmin'))
            <img class="rounded-[30px] mr-[1rem]" src="{{ asset('storage/' . session('infoAdmin')->admin_image) }}" width="60px" height="60px" alt="admin">
            <div class="pr-4">
                <h4>{{ session('infoAdmin')->admin_name }}</h4>
            </div>
        @endif
    </div>
</header>