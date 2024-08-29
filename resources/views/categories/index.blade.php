<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="prose">
            <h1>{{ __("Categories") }}</h1>
        </div>
        @if (session('added'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ __("Confirmed!") }}</strong>
                <span class="block sm:inline">{{ session('added') }}</span>
            </div>
        @endif
        
        @if (session('updated'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ __("Confirmed!") }}</strong>
                <span class="block sm:inline">{{ session('updated') }}</span>
            </div>
        @endif

        @if (session('deleted'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ __("Confirmed!") }}</strong>
                <span class="block sm:inline">{{ session('deleted') }}</span>
            </div>
        @endif
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        <a href="{{ route('categories.index', ['sort' => 'name', 'direction' => $sortField === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                        {{ __("Category") }}
                                            @if ($sortField === 'name' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'name' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">{{ __("Edit") }}</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $category->name }}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">                                           
                                            <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900">{{ __("Edit") }}<span class="sr-only">, {{ $category->name }}</span></a>
                                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">{{ __("Delete") }}<span class="sr-only">, {{ $category->name }}</span></button>
                                            </form>
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
        <h1 class="text-2xl font-bold mb-4">{{ __("Add New Category") }}</h1>
    </div>
    <div class="max-w-2xl mx-auto p-2 sm:p-3 lg:p-4">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="max-w-2xl mx-auto p-2 sm:p-3 lg:p-4">
                <input
                    name="name"
                    placeholder="{{ __('Title') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('name') }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <x-primary-button class="mt-4">{{ __("Add Category") }}</x-primary-button>
        </form>
    </div>
</x-app-layout>