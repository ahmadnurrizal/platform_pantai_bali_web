<!doctype html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        <!-- Static sidebar for desktop -->
        @include('admin.sidebar')
        <div class="md:pl-64 flex flex-col flex-1">
            <main class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900">Tambah Pantai</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <script type="text/javascript">
                            function preview_image() {
                                var total_file = document.getElementById("image").files.length;
                                for (var i = 0; i < total_file; i++) {
                                    $('#image_preview').append("<img 'width='100px' style='margin-right: 20px;width: 100px'  src='" + URL.createObjectURL(event.target.files[i]) + "'>");
                                }
                            }
                        </script>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div>
                            <div>
                                <!-- <h3 class="text-lg leading-6 font-medium text-gray-900">Tambah Pantai</h3> -->
                                <p class="mt-1 text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit. Quam neque velit
                                    deserunt porro at soluta debitis quaerat voluptas iste eius laboriosam laborum sed
                                    consequuntur, nulla dicta
                                    fuga error molestiae reprehenderit.</p>
                            </div>
                            <form id="form-data" method="post" enctype="multipart/form-data">
                                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    @csrf
                                    <div class="sm:col-span-4">
                                        <label for="nama" class="block text-sm font-medium text-gray-700"> Nama Pantai
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <!-- <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm"> workcation.com/ </span> -->
                                            <input type="text" name="beach_name" id="beach_name"
                                                autocomplete="beach_name"
                                                class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded sm:text-sm border-gray-300">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="nama" class="block text-sm font-medium text-gray-700"> Lokasi Pantai
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <!-- <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm"> workcation.com/ </span> -->
                                            <input type="text" name="beach_location" id="beach_location"
                                                autocomplete="beach_location"
                                                class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded sm:text-sm border-gray-300">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <label for="about" class="block text-sm font-medium text-gray-700"> Deskripsi
                                            Pantai </label>
                                        <div class="mt-1">
                                            <textarea id="beach_description" name="beach_description" rows="3"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about beach.</p>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <label for="photo" class="block text-sm font-medium text-gray-700"> Photo
                                        </label>
                                        <div
                                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                    fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <!-- <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                        <span>Upload a file</span>
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p> -->
                                                </div>
                                                <input type="file" onchange="preview_image();"
                                                    class="form-control relative cursor-pointer" name="images[]"
                                                    id="image" multiple>

                                                <div id="image_preview"
                                                    style="overflow: hidden; display: flex; justify-content:space-around;">

                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 1MB each image</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button type="submit"
                                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                                            Beach</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
        Array.prototype.filter.call($('#form-data'), function (form) {
            form.addEventListener('submit', function (event) {
                let formData = new FormData(this);
                event.preventDefault();
                var url = "{{ url('api/beachAPI')}}";
                $.ajax({
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response)
                        // alert(response)
                        alert("Success add beach")
                        window.location.reload();
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    });
</script>
