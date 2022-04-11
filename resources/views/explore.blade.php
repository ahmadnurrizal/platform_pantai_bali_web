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
                                        <svg class="h-12 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
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
        <a href=""
            class="-mt-14 z-10 col-start-3 col-end-4 h-13 rounded-t-lg w-full bg-black opacity-30 text-white hover:bg-white hover:opacity-100 hover:text-black">
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
                <select id="sort" name="sort"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option selected>None</option>
                    <option>Highest</option>
                    <option>Lowest</option>
                </select>
            </div>
        </div>
        <div class="flex justify-center items-center py-12" id="all-beach">
            @include('pagination_data')

        </div>
        <meta name="referrer" content="no-referrer" />
    </div>
    @include('footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url: '/explore/fetch_data?page=' + page,
                    type: 'get',
                    success: function (data) {
                        $('#all-beach').html(data);
                    }
                });
            }
        });
    </script>
</body>

</html>
