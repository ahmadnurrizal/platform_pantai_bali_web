<div class="grid grid-cols-4 gap-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    @for ($i = 0; $i < 4; $i++)
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