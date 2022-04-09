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
    <!-- backgrond -->
    <div class="relative -mt-20">
        <div class="static">
            <img src="{{ asset('storage/asset/index_banner.png') }}" alt="" width="" class="bg-auto w-full brightness-50">
            <div class="absolute inset-0 ">
                <div class="flex justify-center h-full">
                    <div class="m-auto">
                        <p class="font-bold text-white text-5xl italic text-center my-3">HaloPantai</p>
                        <p class="font-normal text-white text-2xl ">Platform Informasi Pantai di Pulau Bali</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bar lagi -->
    <div class="flex">
        <div class="flex-none w-40"></div>
        <div class="grow mt-4">
            <div class="relative -mt-16 gap-5 py-5 rounded bg-white">
                <div class="grid grid-cols-6 items-center mx-10">
                    <div class="col-span-4">
                        <div class="relative">
                            <input type="text" class="rounded border-none bg-gray-100 w-full px-3 py-3" placeholder="Search...">
                            <div class="absolute top-0 -right-1 flex items-center h-full pr-1">
                                <a href="">
                                    <div class="bg-cyan-600 rounded-r-lg w-14 flex justify-center">
                                        <svg class="h-12 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="flex relative justify-center space-x-16">
                            <a href="" class="font-normal text-gray-600 hover:text-blue-400">Discover</a>
                            <a href="" class="font-normal text-gray-600 hover:text-blue-400">Contact Us</a>
                            <a href="" class="font-normal text-gray-600 hover:text-blue-400">About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-none w-40"></div>
    </div>
    <!-- content -->
    <div class="mx-auto px-44 py-5">
        <!-- choice -->
        <p class="font-medium text-2xl">Choose your side</p>
        <p class="font-normal text-base text-gray-400">Surfing or diving ? we have it.</p>
        <div class="flex justify-around items-center py-12 px-5">
            <a href="" class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3 hover:brightness-75 ease-in-out duration-300">
                    <img src="{{ url('images/index_c1.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6">
                    <p class="text-black font-medium text-lg">Surfing Beach</p>
                    <p class="text-gray-400">Explore Beach for Surfing</p>
                </div>
            </a>

            <a href="" class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3 hover:brightness-75 ease-in-out duration-300">
                    <img src="{{ url('images/index_c2.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6">
                    <p class="text-black font-medium text-lg">Diving Beach</p>
                    <p class="text-gray-400">Explore Beach for Diving</p>
                </div>
            </a>
        </div>
        <!-- Explore -->
        <p class="font-medium text-2xl">Explore the best</p>
        <div class="relative flex justify-between">
            <p class="font-normal text-base text-gray-400 justify-start">Best of bali beach based on review</p>
            <a href="/explore" class="font-normal text-base text-green-500 justify-end hover:text-green-800">Explore all >></a>
        </div>
        <div class="flex justify-around items-center py-12 px-5 mx-14">
            <a href="" class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3 hover:brightness-75 ease-in-out duration-300">
                    <img src="{{ url('images/content1.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6 grid gap-1">
                    <p class="text-black font-medium text-lg">Pantai Tidak Berpenghuni</p>
                    <p class="text-black font-medium">2.0 Rated</p>
                    <p class="text-gray-400 text-sm">Jalan Rusak no.69, Bali Utara</p>
                </div>
            </a>
            <a href="" class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3 hover:brightness-75 ease-in-out duration-300">
                    <img src="{{ url('images/content2.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6 grid gap-1">
                    <p class="text-black font-medium text-lg">Pantai Tidak Berpenghuni</p>
                    <p class="text-black font-medium">2.0 Rated</p>
                    <p class="text-gray-400 text-sm">Jalan Rusak no.69, Bali Utara</p>
                </div>
            </a>
            <a href="" class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3 hover:brightness-75 ease-in-out duration-300">
                    <img src="{{ url('images/content3.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6 grid gap-1">
                    <p class="text-black font-medium text-lg">Pantai Tidak Berpenghuni</p>
                    <p class="text-black font-medium">2.0 Rated</p>
                    <p class="text-gray-400 text-sm">Jalan Rusak no.69, Bali Utara</p>
                </div>
            </a>
            <a href="" class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3 hover:brightness-75 ease-in-out duration-300">
                    <img src="{{ url('images/content4.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6 grid gap-1">
                    <p class="text-black font-medium text-lg">Pantai Tidak Berpenghuni</p>
                    <p class="text-black font-medium">2.0 Rated</p>
                    <p class="text-gray-400 text-sm">Jalan Rusak no.69, Bali Utara</p>
                </div>
            </a>
        </div>
    </div>
    @include('ads')
    @include('footer')
</body>

</html>