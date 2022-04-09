<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- navbar -->
    @include('navbar')
    <div class="container mx-auto px-44 py-5 pb-10">
        <div class="flex flex-row">
            <div class="grid grid-cols-5 gap-2">
                <div class="col-span-3">
                    <img src="{{ url('images/detail_1.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="grid grid-cols-2 grid-rows-2 col-span-2 gap-2">
                    @for ($i = 1; $i <= 4; $i++) <img src="{{ url('images/detail_1.png') }}" alt="" width="" class="bg-auto w-full h-full">
                        @endfor
                </div>
            </div>
        </div>
        <div class="grid gap-2 py-3">
            <div class="flex justify-between">
                <div>
                    <p class="text-xl text-black font-bold">Pantai Tidak Berpenghuni</p>
                    <p class="text-sm text-gray-500 font-normal">Jalan, Bali 2.0 Reviews () • 8am - 11pm (Today) </p>
                </div>
                <button class="rounded text-white bg-cyan-600 px-8 my-1">Add Review</button>
            </div>
        </div>
        <div class="grid grid-cols-12 pt-3 border-b-2">
            <div class="border-b-4 flex justify-center">
                <a href="" class="text-gray-500 py-2">About</a>
            </div>
            <div class="border-b-4 border-cyan-400 flex justify-center">
                <a href="" class="text-gray-500 py-2">Review</a>
            </div>
        </div>
        @for ($i = 1; $i <= 3; $i++) <div id="review" class="flex flex-col py-5 gap-3 w-full border-b-2">
            <div class="flex justify-start">
                <img src="{{ url('images/profile.png') }}" alt="" width="" class="bg-auto h-[60px] w-[60px]">
                <div class="flex flex-col justify-center pl-4">
                    <p class="text-base font-medium">Name</p>
                    <p class="text-base font-medium text-gray-500">10 Reviews</p>
                </div>
            </div>
            <p class="text-base font-normal">4.0 • Category • MMM DD, YYYY </p>
            <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    @endfor
    </div>
    @include('footer')
</body>

</html>