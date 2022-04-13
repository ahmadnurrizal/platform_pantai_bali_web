<div class="relative flex justify-around items-center gap-5 py-5 z-10 top-0">
    @if(str_contains(url()->current(), '/explore'))
    <div class="flex items-center justify-start space-x-12">
        <a href="/" class="font-bold text-4xl italic text-white hover:text-blue-400">HaloPantai</a>
    </div>
    @elseif(str_contains(url()->current(), '/beach-detail'))
    <div class="flex items-center justify-start space-x-12">
        <a href="/" class="font-bold text-4xl italic text-black hover:text-blue-400">HaloPantai</a>
    </div>
    @else
    <div class="invisible flex items-center justify-start space-x-12">
        <!-- <a href="/" class="font-bold text-4xl italic text-white">HaloPantai</a> -->
    </div>
    @endif

    @if(Session::has('user'))
    <p>{{ Session::get('user')->name }}</p>
    @endif
    <!-- @if(Request::is('/explore')) container @endif  -->
    @if(str_contains(url()->current(), '/beach-detail'))
    <div class="flex items-center justify-end space-x-12">
        <a href="/login" class="font-normal text-gray-600 hover:text-blue-400">Log in</a>
        <a href="/register" class="font-normal text-gray-600 hover:text-blue-400">Sign Up</a>
    </div>
    @else
    <div class="flex items-center justify-end space-x-12">
        <a href="/login" class="font-normal text-white hover:text-blue-400">Log in</a>
        <a href="/register" class="font-normal text-white hover:text-blue-400">Sign Up</a>
    </div>
    @endif
</div>
