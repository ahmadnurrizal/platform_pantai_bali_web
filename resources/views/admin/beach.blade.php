<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="flex justify-end">
    <button class="rounded text-white bg-blue-600 px-4 py-2 m-4 mr-0">Tambah Pantai</button>
</div>
<table id="table_id" class="min-w-full divide-y divide-gray-200">
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
                <a href="javascript:void(0)" onClick="delete_data({{ $beach->id }})"
                    class="text-red-600 hover:text-indigo-900">Delete</a>
            </td>
        </tr>

        @endforeach

        <!-- More people... -->
    </tbody>
</table>
