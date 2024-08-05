<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('patch')
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <input
                    type="text"
                    name="name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('name', $category->name) }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Saglabāt') }}</x-primary-button>
                <a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-gray-900">{{ __('Atcelt') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>