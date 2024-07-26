<x-app-layout>
    <div class="max-w-2xl mx-auto p-2 sm:p-3 lg:p-4">
        <h1 class="text-2xl font-bold mb-4">{{ __('Pievienot jaunu') }}</h1>
    </div>
    <div class="max-w-2xl mx-auto p-2 sm:p-3 lg:p-4">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="max-w-2xl mx-auto p-2 sm:p-3 lg:p-4">
                <input
                    name="name"
                    placeholder="{{ __('Prece') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('name') }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="max-w-2xl mx-auto p-2 sm:p-3 lg:p-4">
                <input
                    name="description"
                    placeholder="{{ __('Apraksts') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('description') }}">
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="max-w-2xl mx-auto p-2 sm:p-3 lg:p-4">
                <input
                    type="number"
                    name="price"
                    placeholder="{{ __('Cena') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('price') }}">
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div class="max-w-2xl mx-auto p-2 sm:p-3 lg:p-4">
                <input
                    type="number"
                    name="quantity"
                    placeholder="{{ __('Skaits noliktavā') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('quantity') }}">
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <x-primary-button class="mt-4">{{ __('Pievienot') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>

