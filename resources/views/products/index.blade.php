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
                                        <a href="{{ route('products.index', ['sort' => 'name', 'direction' => $sortField === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                            Prece
                                            @if ($sortField === 'name' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'name' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        <a href="{{ route('products.index', ['sort' => 'description', 'direction' => $sortField === 'description' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                            Apraksts
                                            @if ($sortField === 'description' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'description' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        <a href="{{ route('products.index', ['sort' => 'price', 'direction' => $sortField === 'price' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                            Cena
                                            @if ($sortField === 'price' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'price' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        <a href="{{ route('products.index', ['sort' => 'quantity', 'direction' => $sortField === 'quantity' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                            Skaits
                                            @if ($sortField === 'quantity' && $sortDirection === 'asc') ↑ @endif
                                            @if ($sortField === 'quantity' && $sortDirection === 'desc') ↓ @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Pārdevējs</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($products as $product)
                                    <tr class="{{ $product->quantity == 0 ? 'bg-gray-100' : '' }}">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $product->name }}
                                            @if ($product->quantity == 0)
                                                <span class="text-red-600">(!)</span>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->description }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->price }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm {{ $product->quantity == 0 ? 'text-gray-500' : 'text-gray-900' }}">{{ $product->quantity }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->user->name }}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            @if ($product->user->is(auth()->user()))
                                                <a href="{{ route('products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $product->name }}</span></a>
                                                <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete<span class="sr-only">, {{ $product->name }}</span></button>
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
</x-app-layout>
