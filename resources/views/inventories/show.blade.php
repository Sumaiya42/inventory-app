<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">{{ $inventory->name }}</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('items.create', $inventory) }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">
           + Add Item
        </a>

        @if($inventory->items->isEmpty())
            <p>No items in this inventory yet.</p>
        @else
            <table class="table-auto w-full border mt-2">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventory->items as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->id }}</td>
                        <td class="border px-4 py-2">{{ $item->name }}</td>
                        <td class="border px-4 py-2">{{ $item->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
