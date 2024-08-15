<x-guest-layout>
    <div class="dark:text-gray-100">
        <div class="py-5">
            <h1 class="text-5xl bold">Yikes, couldn't find what you were looking for!</h1>
        </div>
        <div class="flex-col flex text-center">
            <span style="font-size: 150px; font-weight: bold" class="dark:text-cyan-400 text-center">404</span>
            <span>
                <a href="{{ route('user.frontpage') }}" class="dark:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-800 p-3 border-2  border-cyan-600 rounded-xl">Back to homepage</a>
            </span>
        </div>
    </div>
</x-guest-layout>
