<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List seats') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="mt-2 mb-5">
            <a href="{{ route('seats.create') }}">
                <button class="w-48 h-12 text-lg my-3 rounded-md bg-green-600 text-white hover:bg-green-300 hover:text-gray-600 transition-all">
                    {{ __("Create seat") }}
                </button>
            </a>
        </div>
        <div class="grid grid-cols-6 gap-8">
            @foreach($seats as $seat)
            <div class="bg-gray-200 p-4 rounded-lg shadow-md">
                <div class="text-lg mb-2">{{ $seat->name }}</div>
                <div class="dropdown-container">
                    <button id="dropdownButton" class="button-action bg-blue-500 text-white p-2 rounded hover:bg-blue-600" data-dropdown-toggle="dropdown">{{ __('Action') }}</button>
                    <div class="dropdown-action absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-39 dark:bg-gray-700 m-0">
                        <ul class="space-y-2 py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton">
                            <li>
                                <a href="{{ route('seats.show', ['seat' => $seat->id]) }}" class="block px-4 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    {{ __('Detail') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('seats.edit', ['seat' => $seat->id]) }}" class="block px-4 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    {{ __('Edit') }}
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('seats.destroy', ['seat' => $seat->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="block w-full text-start px-4 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Delete') }}</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-admin-layout>
