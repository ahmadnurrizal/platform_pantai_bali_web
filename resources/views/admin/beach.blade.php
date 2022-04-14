<!doctype html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <div>
        <!-- Static sidebar for desktop -->
        @include('admin.sidebar')
        <div class="md:pl-64 flex flex-col flex-1">
            <main class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900">Beaches</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <div class="flex justify-end">
                            <a href="/admin/beach/add" class="rounded text-white bg-blue-600 px-4 py-2 m-4 mr-0">Tambah Pantai</a>
                        </div>
                        <table id="table_id" class="divide-y divide-gray-200 table-fixed">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Lokasi</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Deskripsi</th>
                                    <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th> -->
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($beaches as $beach)
                                <tr class="bg-white">
                                    @csrf
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $beach->beach_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $beach->beach_location }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $beach->beach_description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <!-- <a href="javascript:void(0)" onClick="delete_data({{ $beach->id }})"
                                        class="text-red-600 hover:text-indigo-900">Delete</a> -->
                                        <!-- <a href="{{route('beach.destroy', [$beach->id])}}" class="text-red-600 hover:text-indigo-900">Delete</a> -->
                                        <button class="deleteRecord" data-id="{{ $beach->id }}">Delete Record</button>
                                    </td>
                                </tr>

                                @endforeach

                                <!-- More people... -->
                            </tbody>
                        </table>
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