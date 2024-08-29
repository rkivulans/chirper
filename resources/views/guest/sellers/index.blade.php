<x-public-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="prose">
            <h1>{{ __("Merchants") }}</h1>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        <a href="{{ route('guest-sellers.index', ['sort' => 'name', 'direction' => $sortField === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                            {{ __("Name") }}
                                            @if ($sortField === 'name' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'name' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        {{ __("Favorite Product") }}
                                    </th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        <a href="{{ route('guest-sellers.index', ['sort' => 'email', 'direction' => $sortField === 'email' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                            {{ __("Email") }}
                                            @if ($sortField === 'email' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'email' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($sellers as $seller)
                                    <tr>
                                        <td class="py-4 px-3 text-sm font-medium text-gray-900">
                                            <a href="{{ route('guest-sellers.show', $seller) }}" class="text-indigo-600 hover:text-indigo-900">{{ $seller->name }}</a>
                                        </td>
                                        <td class="py-4 px-3 text-sm text-gray-500">
                                            @if ($seller->favoriteProduct)
                                                {{ $seller->favoriteProduct->name }}
                                            @else
                                                {{ __("Not a Favorite Product") }}
                                            @endif
                                        </td>
                                        <td class="py-4 px-3 text-sm text-gray-500">{{ $seller->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
