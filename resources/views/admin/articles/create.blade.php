<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
                <form method="POST" action="{{ route('admin.articles.store') }}" id="createPostForm" enctype="multipart/form-data">
                    @csrf
                    @include('admin.articles.form', ['oArticle' => $oArticle])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
