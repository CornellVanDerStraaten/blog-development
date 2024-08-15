<x-guest-layout>
    <div class="dark:text-gray-100">
        <div class="my-2">
            <a href="{{ route('user.article.index') }}" class="dark:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-800 p-2 px-3 border-2  border-cyan-600 rounded-xl">< Back</a>
        </div>
        <div class="py-5">
            <h1 class="text-5xl bold">{{ $oArticle->title }}</h1>
            <h2 class="text-2xl bold dark:text-cyan-500">{{ $oArticle->subtitle }}</h2>
            <p class="pt-5 text-xl">
                {{ $oArticle->excerpt }}
            </p>
        </div>
        <div class="py-5 text-md">
            {!! \Illuminate\Support\Str::markdown($oArticle->content) !!}
        </div>
    </div>
</x-guest-layout>
