<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- navbar -->
    <div class="relative flex justify-between items-center gap-5 py-5 z-10 top-0">
        <div class="container flex items-center justify-end space-x-12">
            <a href="" class="font-normal text-white">Log in</a>
            <a href="" class="font-normal text-white">Sign Up</a>
        </div>
    </div>
    <!-- backgrond -->
    <div class="relative -mt-16">
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
                <div class="relative flex justify-between items-center">
                    <div class="container flex items-center justify-center space-x-12">
                        <!-- Search -->
                        <div class="relative">
                            <input type="text" class="rounded bg-gray-100 w-96 px-3 py-3" placeholder="Search...">
                            <div class="absolute top-0 right-0 flex items-center h-full">
                                <div class="bg-cyan-600 rounded w-10 flex justify-center">
                                    <a href="">
                                        <svg class="h-12 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="" class="font-normal text-black">Discover</a>
                        <a href="" class="font-normal text-black">Contact Us</a>
                        <a href="" class="font-normal text-black">About Us</a>
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
            <div class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3">
                    <img src="{{ asset('storage/asset/index_c1.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6">
                    <p class="text-black font-medium text-lg">Surfing Beach</p>
                    <p class="text-gray-400">Explore Beach for Surfing</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3">
                    <img src="{{ asset('storage/asset/index_c2.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6">
                    <p class="text-black font-medium text-lg">Diving Beach</p>
                    <p class="text-gray-400">Explore Beach for Diving</p>
                </div>
            </div>
        </div>
        <!-- Explore -->
        <p class="font-medium text-2xl">Explore the best</p>
        <div class="relative flex justify-between">
            <p class="font-normal text-base text-gray-400 justify-start">Best of bali beach based on review</p>
            <a href="" class="font-normal text-base text-green-500 justify-end">
                Explore all >>
            </a>
        </div>
        <div class="flex justify-around items-center py-12 px-5 mx-14">
            <div class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3">
                    <img src="{{ asset('storage/asset/content1.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6">
                    <p class="text-black font-medium text-lg">Pantai Tidak Berpenghuni</p>
                    <p class="text-black font-medium">2.0 Rated</p>
                    <p class="text-gray-400 text-sm">Jalan Rusak no.69, Bali Utara</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3">
                    <img src="{{ asset('storage/asset/content2.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6">
                    <p class="text-black font-medium text-lg">Pantai Tidak Berpenghuni</p>
                    <p class="text-black font-medium">2.0 Rated</p>
                    <p class="text-gray-400 text-sm">Jalan Rusak no.69, Bali Utara</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3">
                    <img src="{{ asset('storage/asset/content3.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6">
                    <p class="text-black font-medium text-lg">Pantai Tidak Berpenghuni</p>
                    <p class="text-black font-medium">2.0 Rated</p>
                    <p class="text-gray-400 text-sm">Jalan Rusak no.69, Bali Utara</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden rounded-lg w-full">
                <div class="px-4 py-3">
                    <img src="{{ asset('storage/asset/content4.png') }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="px-4 sm:px-6">
                    <p class="text-black font-medium text-lg">Pantai Tidak Berpenghuni</p>
                    <p class="text-black font-medium">2.0 Rated</p>
                    <p class="text-gray-400 text-sm">Jalan Rusak no.69, Bali Utara</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto py-5 bg-slate-100">
        <div class="relative flex justify-evenly items-center">
            <img src="{{ asset('storage/asset/undraw_my_app.svg') }}" alt="" class="">
            <div class="justify-start grid gap-5">
                <p class="font-semibold text-3xl">Download HaloPantai App</p>
                <p class="text-3xl text-gray-400">We will send you a link, open it on your <br> phone to download the app</p>
                <div class="justify-start">
                    <input type="text" class="rounded bg-white w-96 px-3 py-3" placeholder="Search...">
                    <button class="rounded text-white bg-teal-500 mx-3 px-8 py-3">Send</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto py-5 bg-gray-900">
        <div class="relative flex justify-evenly py-16 my-10 text-white items-center -space-x-36">
            <p class="font-bold text-4xl italic">HaloPantek</p>
            <p>About Us</p>
            <p>Mobile Apps</p>
            <p>Contact</p>
            <p class="text-gray-400">Copyright © 2022 Yaman. All rights reserved.</p>
        </div>
    </div>
</body>

</html>