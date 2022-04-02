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
            <img src="{{ asset('storage/asset/explore_banner.png') }}" alt="" width="" class="bg-auto w-full brightness-50">
            <div class="absolute inset-0 ">
                <div class="flex justify-center h-full">
                    <div class="m-auto grid gap-5">
                        <p class="font-bold text-white text-4xl italic text-center my-3">Explore Pantai</p>
                        <p class="font-normal text-white text-xl px-24">Browse lists of the beautiful beach in Bali</p>
                        <div class="relative">
                            <input type="text" class="rounded bg-gray-100 w-full px-3 py-3" placeholder="Search...">
                            <div class="absolute top-0 -right-1 flex items-center h-full">
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
                </div>
            </div>
        </div>
    </div>
    <!-- bar lagi -->
    <div class="grid grid-cols-11 space-x-1">
        <a href="" class="-mt-14 z-10 col-start-2 col-end-3 h-13 rounded-t-lg w-full bg-white ">
            <p class="flex justify-center mt-5 text-sm font-medium">Explore All</p>
        </a>
        <a href="" class="-mt-14 z-10 col-start-3 col-end-4 h-13 rounded-t-lg w-full bg-black opacity-30 text-white hover:bg-white hover:opacity-100 hover:text-black">
            <p class="flex justify-center mt-5 text-sm font-medium">Favourites</p>
        </a>
    </div>
    <!-- content -->
    <div class="mx-auto px-44 py-5">
        <!-- Explore -->
        <!-- <p class="font-medium text-2xl">Explore the best</p> -->
        <div class="relative flex justify-between items-center">
            <div class="flex justify-start space-x-4">
                <a href="/" class="font-normal text-base text-green-500 justify-end hover:text-green-800">
                    << Discover </a>
                        <p class="text-gray-400">Display 1-12 from 164 beaches</p>
            </div>
            <div class="flex justify-end space-x-4 items-center">
                <p class="font-normal text-base text-gray-400 justify-start">Sort:</p>
                <select id="sort" name="sort" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option selected>None</option>
                    <option>Highest</option>
                    <option>Lowest</option>
                </select>
            </div>
        </div>
        <div class="flex justify-center items-center py-12">
            <div class="grid grid-cols-4 gap-5">
                @for ($i = 1; $i <= 12; $i++) <div class="col-span-1">
                    <a href="" class="bg-white overflow-hidden rounded-lg w-full">
                        <div class="px-4 py-3 hover:brightness-75 ease-in-out duration-300">
                            <img src="{{ asset('storage/asset/content1.png') }}" alt="" width="" class="bg-auto w-full">
                        </div>
                        <div class="px-4 sm:px-6 grid gap-1">
                            <p class="text-black font-medium text-lg">Pantai Tidak Berpenghuni</p>
                            <p class="text-black font-medium">2.0 Rated</p>
                            <p class="text-gray-400 text-sm">Jalan Rusak no.69, Bali Utara</p>
                        </div>
                    </a>
            </div>
            @endfor
        </div>
    </div>
    <!-- pagination -->
    <div class="relative flex justify-end items-center">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <span class="sr-only">Previous</span>
                <!-- Heroicon name: solid/chevron-left -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
            <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
            <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 1 </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 2 </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium"> 3 </a>
            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700"> ... </span>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium"> 8 </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 9 </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 10 </a>
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <span class="sr-only">Next</span>
                <!-- Heroicon name: solid/chevron-right -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </nav>
    </div>
    </div>
    @include('footer')
</body>

</html>