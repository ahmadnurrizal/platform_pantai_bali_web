<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="grid grid-cols-2">
        <div class="">
            <img src="{{ asset('storage/asset/banner.png') }}" alt="" width="" class="bg-cover h-screen w-full">
        </div>
        <div class="flex justify-center h-full">
            <div class="m-auto">
                <div class="grid gap-2 w-[355px]">
                    <p class="text-lg text-gray-500">Welcome to HaloPantai</p>
                    <p class="text-3xl font-semibold">Register to your account</p>
                    <p class="text-base">Email</p>
                    <input type="email" class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="ambatukam@example.com">
                    <p class="text-base">Password</p>
                    <input type="password" class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
                    <p class="text-base">Confirm Password</p>
                    <input type="password" class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">                    
                    <button class="rounded text-white bg-cyan-600 w-full py-3 mt-7 hover:bg-cyan-700">Register now</button>
                    <p class="flex justify-center text-gray-500 font-normal pt-5">Have an account? &nbsp;<a href="/login" class="font-normal text-base text-blue-400 justify-end hover:text-blue-500">Login Now</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>