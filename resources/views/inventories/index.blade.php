<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">{{ __('My Inventories') }}</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Add Inventory button -->
        <div class="mb-4">
            <a href="{{ route('inventories.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
               + Add Inventory
            </a>
        </div>

        <!-- Owned Inventories -->
        <h3 class="font-semibold mt-4">Owned Inventories</h3>
        @if($ownedInventories->isEmpty())
            <p>You do not own any inventories yet.</p>
        @else
            <table class="table-auto w-full mt-2 border">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ownedInventories as $inv)
                    <tr>
                        <td class="border px-4 py-2">{{ $inv->id }}</td>
                        <td class="border px-4 py-2">{{ $inv->name }}</td>
                        <td class="border px-4 py-2">
                            <!-- View Items button -->
                            <a href="{{ route('inventories.show', $inv) }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-3 py-1 rounded">
                               View Items
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</x-app-layout>
