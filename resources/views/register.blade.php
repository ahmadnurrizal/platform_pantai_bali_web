<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="grid grid-cols-2">
        <div class="">
            <img src="{{ url('images/banner.png') }}" alt="" width="" class="bg-cover h-screen w-full">
        </div>
        <div class="flex justify-center h-full">
            <div class="z-10 m-auto static">
                <form id="form-data" method="post">
                    @csrf


                    <p class="text-lg text-gray-500">Welcome to HaloPantai</p>
                    <p class="text-3xl font-semibold">Register to your account</p>
                    <p class="text-base">Email</p>
                    <input type="email" id="email" name="email"
                        class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="sunarto@example.com" required>
                    <p class="text-base">Name</p>
                    <input type="text" id="name" name="name"
                        class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="Amba Tukam" required>
                    <p class="text-base">Password</p>
                    <input type="password" id="password" name="password"
                        class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="" required>
                    <button type="submit"
                        class="rounded text-white bg-cyan-600 w-full py-3 mt-7 hover:bg-cyan-700">Register
                        now</button>
                    <p class="flex justify-center text-gray-500 font-normal pt-5">Have an account? &nbsp;<a
                            href="/login"
                            class="font-normal text-base text-blue-400 justify-end hover:text-blue-500">Login
                            Now</a>
                    </p>
                </form>

            </div>
            <div class="z-20 flex justify-end absolute top-0 right-0 mx-3 my-3">
                <a href="/">Close</a>
            </div>


        </div>

    </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
        Array.prototype.filter.call($('#form-data'), function (form) {
            form.addEventListener('submit', function (event) {
                let formData = new FormData(this);
                event.preventDefault();
                var url = "{{ url('api/register') }}";
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
                        alert("Success register")
                        // window.location.reload();
                        location.replace("http://127.0.0.1:8000/login")
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    });
</script>

</html>
