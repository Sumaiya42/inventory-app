<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">{{ __('Add Item to ') . $inventory->name }}</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('items.store', $inventory) }}">
            @csrf

            <div class="mb-4">
                <label class="block font-medium text-gray-700">Item Name</label>
                <input type="text" name="name" class="border rounded w-full px-3 py-2 mt-1" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700">Description</label>
                <textarea name="description" class="border rounded w-full px-3 py-2 mt-1" rows="4"></textarea>
            </div>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                Add Item
            </button>
        </form>
    </div>
</x-app-layout>
