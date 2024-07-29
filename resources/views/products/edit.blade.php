<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('products.update', $product) }}">
            @csrf
            @method('patch')
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <input
                    type="text"
                    name="name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('name', $product->name) }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <input
                    type="text"
                    name="description"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('description', $product->description) }}">
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <input
                    type="number"
                    step="0.01"
                    name="price"
                    placeholder="{{ __('Cena') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('price', $product->price) }}">
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <input
                    type="number"
                    name="quantity"
                    placeholder="{{ __('Skaits noliktavā') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('quantity', $product->quantity) }}">
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Saglabāt') }}</x-primary-button>
                <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-900">{{ __('Atcelt') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
