<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="prose">
            <h1>Category</h1>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        <a href="{{ route('categories.index', ['sort' => 'name', 'direction' => $sortField === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                        Kategorija
                                            @if ($sortField === 'name' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'name' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($categories as $product)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $category->name }}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            @if ($category->user->is(auth()->user()))
                                                <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $category->name }}</span></a>
                                                <form method="POST" action="{{ route('categories.destroy', $category->id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete<span class="sr-only">, {{ $category->name }}</span></button>
                                                </form>
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
        <h1 class="text-2xl font-bold mb-4">{{ __('Pievienot jaunu kategoriju') }}</h1>
    </div>
    <div class="max-w-2xl mx-auto p-2 sm:p-3 lg:p-4">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="max-w-2xl mx-auto p-2 sm:p-3 lg:p-4">
                <input
                    name="name"
                    placeholder="{{ __('Nosaukums') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('name') }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <x-primary-button class="mt-4">{{ __('Pievienot') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>