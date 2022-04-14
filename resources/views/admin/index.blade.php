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
                        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="py-4">
                            <div class="grid grid-cols-4 gap-4">
                                @for ($i = 0; $i < 4; $i++)  <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="bg-white overflow-hidden shadow rounded-lg">
                                    <div class="px-4 py-2">
                                        <!-- Content goes here -->
                                        <p>Jumlah Users</p>
                                    </div>
                                    <div class="px-4 py-7">
                                        <!-- Content goes here -->
                                        <p class="text-2xl">123 User</p>
                                    </div>
                                </div>
                                @endfor
                        </div>
                        <!-- <div class="border-4 border-dashed border-gray-200 rounded-lg h-96"></div> -->
                        <!-- include('admin.beach') -->
                        <!-- include('admin.beach-add') -->
                        <!-- include('admin.dashboard') -->
                    </div>
                    <!-- /End replace -->
                </div>
        </div>
        </main>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
<script type="text/javascript">
    $(".deleteRecord").click(function() {
        var id = parseInt($(this).data("id"));
        console.log(id);
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/api/beach/deleteAPI/" + id,
            type: 'post',
            data: {
                "id": id,
                "_token": token,
            },
            success: function() {
                console.log("it Works");
                window.location.reload();
                alert('Success delete data')
                location.reload();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });

    });
</script>

</html>