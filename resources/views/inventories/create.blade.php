<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">{{ __('Create Inventory') }}</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('inventories.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-medium text-gray-700">Inventory Name</label>
                <input type="text" name="name" class="border rounded w-full px-3 py-2 mt-1" required>
            </div>

            <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                Create Inventory
            </button>
        </form>
    </div>
</x-app-layout>
