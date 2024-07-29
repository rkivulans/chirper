<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="prose">
            <h1>eBay</h1>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        @if ($sortField === 'name')
                                            <a href="{{ route('products.index', ['sort' => 'name', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                                Prece
                                                @if ($sortDirection === 'asc')
                                                    &uarr;
                                                @else
                                                    &darr;
                                                @endif
                                            </a>
                                        @else
                                            <a href="{{ route('products.index', ['sort' => 'name', 'direction' => 'asc']) }}">
                                                Prece
                                            </a>
                                        @endif
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        @if ($sortField === 'description')
                                            <a href="{{ route('products.index', ['sort' => 'description', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                                Apraksts
                                                @if ($sortDirection === 'asc')
                                                    &uarr;
                                                @else
                                                    &darr;
                                                @endif
                                            </a>
                                        @else
                                            <a href="{{ route('products.index', ['sort' => 'description', 'direction' => 'asc']) }}">
                                                Apraksts
                                            </a>
                                        @endif
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        @if ($sortField === 'price')
                                            <a href="{{ route('products.index', ['sort' => 'price', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                                Cena
                                                @if ($sortDirection === 'asc')
                                                    &uarr;
                                                @else
                                                    &darr;
                                                @endif
                                            </a>
                                        @else
                                            <a href="{{ route('products.index', ['sort' => 'price', 'direction' => 'asc']) }}">
                                                Cena
                                            </a>
                                        @endif
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        @if ($sortField === 'quantity')
                                            <a href="{{ route('products.index', ['sort' => 'quantity', 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                                Skaits
                                                @if ($sortDirection === 'asc')
                                                    &uarr;
                                                @else
                                                    &darr;
                                                @endif
                                            </a>
                                        @else
                                            <a href="{{ route('products.index', ['sort' => 'quantity', 'direction' => 'asc']) }}">
                                                Skaits
                                            </a>
                                        @endif
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Pārdevējs</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $product->name }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->description }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->price }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->quantity }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            Nav
                                            @unless ($product->created_at->eq($product->updated_at))
                                                <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                            @endunless
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            @if ($product->user->is(auth()->user()))
                                                <x-dropdown>
                                                    <x-slot name="trigger">
                                                        <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            </svg>
                                                        </button>
                                                    </x-slot>
                                                    <x-slot name="content">
                                                        <x-dropdown-link :href="route('products.edit', $product->id)">
                                                            {{ __('Edit') }}
                                                        </x-dropdown-link>
                                                        <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <x-dropdown-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                {{ __('Delete') }}
                                                            </x-dropdown-link>
                                                        </form>
                                                    </x-slot>
                                                </x-dropdown>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>        
                </div>
            </div>
        </div>
    </div>
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
                    step="0.01"
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
