<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory: ') }} {{ $inventory->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Add Item Button -->
            <div class="mb-4">
                <a href="{{ route('items.create', $inventory->id) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 focus:outline-none">
                    {{ __('Add New Item') }}
                </a>
            </div>

            @if($items->isEmpty())
                <p>No items added yet for this inventory.</p>
            @else
                <table class="min-w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Item Name</th>
                            <th class="px-4 py-2 border">Quantity</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td class="px-4 py-2 border">{{ $item->id }}</td>
                                <td class="px-4 py-2 border">{{ $item->name }}</td>
                                <td class="px-4 py-2 border">{{ $item->quantity }}</td>
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('items.edit', [$inventory->id, $item->id]) }}" class="text-blue-600 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div class="mt-4">
                <a href="{{ route('inventories.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back to Inventories</a>
            </div>

        </div>
    </div>
</x-app-layout>
