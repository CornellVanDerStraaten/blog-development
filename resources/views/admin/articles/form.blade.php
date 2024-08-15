<div class="space-y-12">
    <div class="border-b border-white/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-white">Article</h2>
        <p class="mt-1 text-sm leading-6 text-gray-400">Good luck writing your next article!</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="title" class="block text-sm font-medium leading-6 text-white">Title</label>
                <div class="mt-2">
                    <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <input type="text" @isset($show) disabled @endisset value="{{ old('title') ?: $oArticle->title }}" name="title" id="title" class="flex-1 border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm sm:leading-6">
                        @if($oArticle->slug)
                        <p class="mt-3 text-sm leading-6 text-gray-400"{{ $oArticle->slug }}</p>
                        @endif
                    </div>
                </div>
                @error('title')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-4">
                <label for="subtitle" class="block text-sm font-medium leading-6 text-white">Subtitle</label>
                <div class="mt-2">
                    <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <input @isset($show) disabled @endisset type="text" name="subtitle" value="{{ old('subtitle') ?: $oArticle->subtitle }}" id="subtitle" class="flex-1 border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm sm:leading-6">
                    </div>
                </div>
                @error('subtitle')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-full">
                <label for="excerpt" class="block text-sm font-medium leading-6 text-white">Excerpt</label>
                <div class="mt-2">
                    <textarea @isset($show) disabled @endisset id="excerpt" name="excerpt" rows="3" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">{{ old('excerpt') ?: $oArticle->excerpt }}</textarea>
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-400">Text shown on archive views and the article header.</p>
                @error('excerpt')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-full">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="main_image">Upload file</label>
                <input @isset($show) disabled @endisset class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="main_image" name="main_image" type="file">
                @error('main_image')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
                @if ($oArticle->main_image)
                    <div>
                        <img src="{{ asset($oArticle->main_image) }}">
                    </div>
                @endif
            </div>

            <div class="col-span-full">
                <input type="hidden" name="content" id="markdown-content">
                <input type="hidden" value="{{ $oArticle->content }}" id="oldContent">
                <label for="editor" class="text-gray-600 font-semibold">Content</label>
                <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-white"><div>
            </div>
                    @error('content')
                    <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                    @enderror
        </div>
    </div>
</div>

@if(!isset($show))
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="{{ route('admin.articles.index') }}" class="text-sm font-semibold leading-6 text-white">Cancel</a>
        <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
    </div>
@endif
