<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" />
</head>

<body>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <!-- navbar -->
    @include('navbar')
    <div class="container mx-auto px-44 py-5 pb-10">
        <div class="flex flex-row">
            <div class="grid grid-cols-5 gap-2">
                <div class="col-span-3">
                    <img src="{{ $images[0] }}" alt="" width="" class="bg-auto w-full">
                </div>
                <div class="grid grid-cols-2 grid-rows-2 col-span-2 gap-2">
                    @foreach($images as $key =>$image)
                    @if(!$key==0)
                    <img src="{{ $image }}" alt="" width="" class="bg-auto w-full h-full">
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="grid gap-2 py-3">
            <div class="flex justify-between">
                <div>
                    <p class="text-xl text-black font-bold">{{ $detailBeach->beach_name }}</p>
                    <p class="text-sm text-gray-500 font-normal">{{ $detailBeach->beach_location }} </p>
                </div>
                <button class="rounded text-white bg-cyan-600 px-8 my-1" onclick="toggleModal('modal-id')">Add Review</button>
            </div>
        </div>
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg border-b-2" id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false">About</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="review-tab" data-tabs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Review</button>
                </li>

            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden" id="about" role="tabpanel" aria-labelledby="about-tab">
                <p class="text-base text-gray-700 font-normal my-12">{{ $detailBeach->beach_description }} </p>
            </div>
            <div class="hidden" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div>
                    @for ($i = 1; $i <= 3; $i++) <!-- review -->
                        <div id="review" class="flex flex-col py-5 gap-3 w-full border-b-2">
                            <div class="flex justify-start">
                                <img src="{{ url('images/profile.png') }}" alt="" width="" class="bg-auto h-[60px] w-[60px]">
                                <div class="flex flex-col justify-center pl-4">
                                    <p class="text-base font-medium">Name</p>
                                    <p class="text-base font-medium text-gray-500">10 Reviews</p>
                                </div>
                            </div>
                            <p class="text-base font-normal">4.0 • Category • MMM DD, YYYY </p>
                            <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        @endfor
                </div>
            </div>
        </div>
        <!-- MODAL -->
        <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
            <div class="relative w-auto my-6 mx-auto max-w-3xl">
                <!--content-->
                <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                    <!--header-->
                    <div class="flex items-start justify-between p-5 rounded-t">
                        <h3 class="text-xl font-semibold">
                            Add Review
                        </h3>                    
                        <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                        ×
                        </button>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto my-4">
                        <div class="mt-1 flex rounded-md shadow-sm w-[37rem]">
                            <!-- <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm"> workcation.com/ </span> -->
                            <textarea id="beach_description" name="beach_description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>
                    <!--footer-->
                    <div class="flex items-center justify-end p-6 rounded-b">
                        <button class="rounded text-white bg-cyan-600 px-8 h-10">Add Review</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
        <script type="text/javascript">
            function toggleModal(modalID) {
                document.getElementById(modalID).classList.toggle("hidden");
                document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                document.getElementById(modalID).classList.toggle("flex");
                document.getElementById(modalID + "-backdrop").classList.toggle("flex");
            }
        </script>
        <!-- <div class="grid grid-cols-12 pt-3 border-b-2">
            <div class="border-b-4 flex justify-center">
                <a href="" class="text-gray-500 py-2">About</a>
            </div>
            <div class="border-b-4 border-cyan-400 flex justify-center">
                <a href="" class="text-gray-500 py-2">Review</a>
            </div>
        </div> -->
    </div>
    @include('footer')
</body>

</html>