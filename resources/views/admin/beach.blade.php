    <div class="flex justify-end">
        <button class="rounded text-white bg-blue-600 px-4 py-2 m-4 mr-0">Tambah Pantai</button>
    </div>
    <table id="table_id" class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th> -->
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 10; $i++) <!-- Odd row -->
                <tr class="bg-white">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jane Cooper</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Regional Paradigm Technician</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">jane.cooper@example.com</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="#" class="text-red-600 hover:text-indigo-900">Delete</a>
                    </td>
                </tr>
                <!-- Even row -->
                <tr class="bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Cody Fisher</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Product Directives Officer</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">cody.fisher@example.com</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="#" class="text-red-600 hover:text-indigo-900">Delete</a>
                    </td>
                </tr>
                @endfor
                <!-- More people... -->
        </tbody>
    </table>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>