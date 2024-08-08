<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="prose">
            <h1>{{ $seller->name }}</h1>
            <p>{{ $seller->email }}</p>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        <a href="{{ route('sellers.show', ['seller' => $seller, 'sort' => 'name', 'direction' => $sortField === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                            Prece
                                            @if ($sortField === 'name' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'name' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        <a href="{{ route('sellers.show', ['seller' => $seller, 'sort' => 'description', 'direction' => $sortField === 'description' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                            Apraksts
                                            @if ($sortField === 'description' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'description' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        <a href="{{ route('sellers.show', ['seller' => $seller, 'sort' => 'price', 'direction' => $sortField === 'price' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                            Cena
                                            @if ($sortField === 'price' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'price' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        <a href="{{ route('sellers.show', ['seller' => $seller, 'sort' => 'quantity', 'direction' => $sortField === 'quantity' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                            Skaits
                                            @if ($sortField === 'quantity' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'quantity' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($products as $product)
                                    <tr class="{{ $product->quantity == 0 ? 'bg-gray-100' : '' }}">
                                        <td class="py-4 px-3 text-sm font-medium text-gray-900">
                                            {{ $product->name }}
                                            @isset($product->category)
                                                <span class="ml-2 text-green-600">({{ $product->category->name }})</span>
                                            @endisset
                                            <span class="text-red-600">{{ $product->quantity == 0 ? '(!)' : '' }}</span>
                                        </td>
                                        <td class="py-4 px-3 text-sm text-gray-500">{{ $product->description }}</td>
                                        <td class="py-4 px-3 text-sm text-gray-500">{{ $product->price }}</td>
                                        <td class="py-4 px-3 text-sm {{ $product->quantity == 0 ? 'text-gray-900' : 'text-gray-500' }}">{{ $product->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
