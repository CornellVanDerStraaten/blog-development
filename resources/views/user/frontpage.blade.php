<x-guest-layout>
    <div class="dark:text-gray-100">
        <div class="py-5">
            <h1 class="text-5xl bold">Hi, I'm Cornell</h1>
            <p class="pt-5 text-xl">
                I'm a <span class="dark:text-cyan-400 dark:hover:border-b-2 border-cyan-600">software developer</span> who makes some personal projects and writes about code and anything else I want to write about. <br> <br>

                On this site, I will mainly be journaling my progress in personal projects in which even  <span class="dark:text-cyan-400 dark:hover:border-b-2 border-cyan-600 cursor-pointer" onclick="alert('Yes, even you!')">you</span> could occasionally learn something!
            </p>
        </div>
        <div class="py-5">
            <div class="flex justify-between">
                <h2 class="text-4xl bold">Recent Posts</h2>
                <a href="{{ route('user.article.index') }}" class="dark:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-800 p-3 border-2  border-cyan-600 rounded-xl">All Posts</a>
            </div>
        </div>
        <div class="py-5">
            @forelse($ooLatestArticles as $oLatestArticle)
                <a href="{{ route('user.article.show', $oLatestArticle->slug) }}"  class="flex flex-row justify-between hover:bg-gray-700 p-1 px-2 my-2 rounded-lg">
                    <div class="flex flex-col justify-center">
                        <span class="dark:text-cyan-400 text-xl">{{$oLatestArticle->title}}</span>
                        @if($oLatestArticle->subtitle)<span>{{$oLatestArticle->subtitle}}</span>@endif
                    </div>
                    <span class="text-5xl dark:text-cyan-400"> > </span>
                </a>
                <hr>
            @empty
                <span class="dark:text-gray-100 text-gray-700">No recent posts</span>
            @endforelse
        </div>
    </div>
</x-guest-layout>
