<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Game Show: ' . $oGame->name) }}
            </h2>
            <div class="flex items-center justify-end gap-x-6">
                <a href="{{ route('admin.games.index') }}" class="text-sm font-semibold leading-6 text-white">Back</a>
                <a href="{{ route('admin.games.edit', $oGame) }}" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Edit</a>
                <form action="{{ route('admin.games.destroy', $oGame) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Delete</button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
                <form action="#" id="editPostForm" enctype="multipart/form-data">
                    @csrf
                    @include('admin.games.form', ['oGame' => $oGame, 'show' => true])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
