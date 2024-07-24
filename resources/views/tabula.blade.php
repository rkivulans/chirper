<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-300">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Prece</th>
                                                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Apraksts</th>
                                                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Cena</th>
                                                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Skaits</th>
                                                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Pārdevējs</th>
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
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Nav</td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            <x-dropdown>
                                                                <x-slot name="trigger">
                                                                    <button>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                        </svg>
                                                                    </button>
                                                                </x-slot>
                                                                <x-slot name="content">
                                                                    <x-dropdown-link>
                                                                        {{ __('Edit') }}
                                                                    </x-dropdown-link>
                                                                    <form method="POST" action="">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <x-dropdown-link onclick="event.preventDefault(); this.closest('form').submit();">
                                                                                {{ __('Delete') }}
                                                                        </x-dropdown-link>
                                                                    </form>
                                                                </x-slot>
                                                            </x-dropdown>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
