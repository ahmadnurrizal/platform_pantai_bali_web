<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="grid grid-cols-2">
        <div class="">
            <img src="{{ url('images/banner.png') }}" alt="" width="" class="bg-cover h-screen w-full">
        </div>
        <div class="flex justify-center h-full">
            <div class="z-10 m-auto static">

                <div class="grid gap-2 w-[355px]">
                    <div class="grid gap-2 w-[355px]">
                        @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session()->has('fail_login'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('fail_login') }}
                        </div>
                        @endif
                        <p class="text-lg text-gray-500">Welcome to HaloPantai</p>
                        <p class="text-3xl font-semibold">Login to your account</p>
                        <form action="{{ url('/loginAction') }}" method="post">
                            @csrf
                            <p class="text-base">Email</p>
                            <input type="email"
                                class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="ambatukam@example.com" name="email" id="email" required>
                            <p class="text-base">Password</p>
                            <input type="password"
                                class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="" name="password" id="password" required>
                            <div class="flex justify-between">
                                <label class="inline-flex items-center">
                                    <input type="checkbox"
                                        class="rounded-full border-gray-300 text-green-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                                    <span class="ml-2">Remember me</span>
                                </label>
                                <a href=""
                                    class="font-normal text-base text-green-600 justify-end hover:text-green-800">Forgot
                                    password?</a>
                            </div>
                            <button type="submit"
                                class="rounded text-white bg-cyan-600 w-full py-3 mt-7 hover:bg-cyan-700">Login
                                now</button>
                        </form>
                        <p class="flex justify-center text-gray-500 font-normal pt-5">Dont have an account? &nbsp;<a
                                href="/register"
                                class="font-normal text-base text-blue-400 justify-end hover:text-blue-500">Register
                                Now</a>
                        </p>
                    </div>
                </div>
                <div class="z-20 flex justify-end absolute top-0 right-0 mx-3 my-3">
                    <a href="/">Close</a>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
</body>

</html>
