<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css"/>
</head>

<body>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <!-- navbar -->
    @include('navbar')
    <!-- backgrond -->
    <div class="relative -mt-20">
        <div class="static">
            <img src="{{ url('images/explore_banner.png') }}" alt="" width="" class="bg-auto w-full brightness-50">
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
    <div class="grid grid-cols-11 space-x-1" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <button class="-mt-14 z-10 col-start-2 col-end-3 h-13 rounded-t-lg w-full bg-white" id="explore-tab" data-tabs-target="#explore" type="button" role="tab" aria-controls="explore" aria-selected="false">
            <p class="flex justify-center mt-5 text-sm font-medium">Explore All</p>
        </button>
        <button class="-mt-14 z-10 col-start-3 col-end-4 h-13 rounded-t-lg w-full bg-white" id="favourites-tab" data-tabs-target="#favourites" type="button" role="tab" aria-controls="favourites" aria-selected="false">
            <p class="flex justify-center mt-5 text-sm font-medium">Favourites</p>
        </button>
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
        <div class="flex justify-center items-center py-12" id="myTabContent">
            <div class="hidden" id="explore" role="tabpanel" aria-labelledby="explore-tab">
                @include('pagination_data')
            </div>
            <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="favourites" role="tabpanel" aria-labelledby="favourites-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">favourites tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
            </div>
        </div>
        <div class="flex justify-center items-center py-12" id="all-beach">
            <!-- include('pagination_data') -->
        </div>
        <meta name="referrer" content="no-referrer" />
    </div>
    @include('footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                // console.log("kkkkkk")
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                // event.preventDefault();
                $.ajax({
                    url: '/explore/fetch_data?page=' + page,
                    type: 'get',
                    success: function(data) {
                        // console.log(data)
                        $('#all-beach').html(data);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    </script>
</body>

</html>