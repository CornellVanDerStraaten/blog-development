<x-guest-layout>
    <div class="dark:text-gray-100">
        <div class="py-5">
            <h1 class="text-5xl bold">All blogs</h1>
            <p class="pt-5 text-xl">
                Follow my <span class="dark:text-cyan-400 dark:hover:border-b-2 border-cyan-600">journeys</span> or search for a post which might be of use to you. <br> <br>
            </p>
        </div>
        <div class="py-5 pt-1">
            @forelse($ooArticles as $oArticle)
                <a href=" {{ route('user.article.show', $oArticle->slug) }}"  class="flex flex-row justify-between hover:bg-gray-700 p-1 px-2 my-2 rounded-lg">
                    <div class="flex flex-col justify-center">
                        <span class="dark:text-cyan-400 text-xl">{{$oArticle->title}}</span>
                        @if($oArticle->subtitle)<span>{{$oArticle->subtitle}}</span>@endif
                    </div>
                    <span class="text-5xl dark:text-cyan-400"> > </span>
                </a>
                <hr>
            @empty
                <span class="dark:text-gray-100 text-gray-700">No posts</span>
            @endforelse
        </div>
    </div>
</x-guest-layout>
