<div class="grid grid-cols-4 gap-5">
    @foreach($allBeach->data as $beach) <div class="col-span-1">
        <a href="/beach-detail/{{ $beach->id }}" class="bg-white overflow-hidden rounded-lg w-full">
            <div class="px-4 py-3 hover:brightness-75 ease-in-out duration-300">
                <img src="{{ $beach->url }}" alt="" width="" class="bg-auto w-full">
            </div>
            <div class="px-4 sm:px-6 grid gap-1">
                <p class="text-black font-medium text-lg">{{ $beach->beach_name }}</p>
                <p class="text-black font-medium">2.0 Rated</p>
                <p class="text-gray-400 text-sm">{{ $beach->beach_location }}</p>
            </div>
        </a>
    </div>
    @endforeach
    <div class="pagination">

    </div>
</div>
