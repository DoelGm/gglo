<!-- resources/views/catalogo-Users.blade.php -->
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg p-3">
                <x-table-users :users="$users" />
            </div>
        </div>
    </div>
</x-app-layout>
