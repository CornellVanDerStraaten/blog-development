<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
                    <div>
                        <div class="mx-auto max-w-7xl">
                            <div class="py-10">
                                <div class="px-4 sm:px-6 lg:px-8">
                                    <div class="sm:flex sm:items-center">
                                        <div class="sm:flex-auto">
                                            <h1 class="text-base font-semibold leading-6 text-white">Articles</h1>
                                            <p class="mt-2 text-sm text-gray-300">All articles.</p>
                                        </div>
                                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                            <a href="{{ route('admin.articles.create') }}" class="block rounded-md bg-indigo-500 px-3 py-2 text-center text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add article</a>
                                        </div>
                                    </div>
                                    <div class="mt-8 flow-root">
                                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                                <table class="min-w-full divide-y divide-gray-700">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Title</th>
                                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Views</th>
                                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-gray-800">

                                                    @foreach($ooArticles as $oArticle)
                                                        <tr>
                                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{ $oArticle->title }}</td>
                                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">300</td>
                                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                                <a href="{{ route('admin.articles.edit', $oArticle) }}" class="text-indigo-400 hover:text-indigo-300">Edit<span class="sr-only">, {{ $oArticle->title }}</span></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                    <!-- More people... -->
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
    </div>
</x-app-layout>
