<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 prose">
        <style>
            table, th, td {
                border:1px solid black;
            }
        </style>

        <table style="width:100%">
            <tr>
                <th>Prece</th>
                <th>Apraksts</th>
                <th>Cena</th>
                <th>Skaits</th>
                <th>Pārdevējs</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>Nav</td>
                    <td>
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
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
        </table>
    </div>
</x-app-layout>
