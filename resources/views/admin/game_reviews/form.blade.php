<div class="space-y-12">
    <div class="border-b border-white/10 pb-12">
        <div class="flex justify-between">
            <div>
                <h2 class="text-base font-semibold leading-7 text-white">Game Review</h2>
                <p class="mt-1 text-sm leading-6 text-gray-400">Good luck writing your next game review!</p>
            </div>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="sm:col-span-4">
                <label for="title" class="block text-sm font-medium leading-6 text-white">Published</label>
                <div class="mt-2">
                    <div class="flex rounded-md">
                        <input id="is_published" @if((old('is_published') ?: $oGameReview->is_published)) checked @endif name="is_published" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                </div>
                @error('is_published')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-4">
                <label for="game_id" class="block text-sm font-medium leading-6 text-white">Game</label>
                <div class="mt-2">
                    <div class="flex rounded-md">
                        <select required id="game_id" name="game_id" class="mt-2 block w-full rounded-md  ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500  bg-white/5 border-0 py-1.5 pl-3 pr-10 text-gray-200  sm:text-sm sm:leading-6">
                            @foreach ($ooGames as $oGame)
                                <option @if((old('game_id') ?: $oGameReview->game_id) == $oGame->id) selected @endif value="{{$oGame->id}}" >{{$oGame->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('game_id')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-4">
                <label for="title" class="block text-sm font-medium leading-6 text-white">Title</label>
                <div class="mt-2">
                    <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <input type="text" @isset($show) disabled @endisset value="{{ old('title') ?: $oGameReview->title }}" name="title" id="title" class="flex-1 border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm sm:leading-6">
                        @if($oGameReview->slug)
                        <p class="mt-3 text-sm leading-6 text-gray-400"{{ $oGameReview->slug }}</p>
                        @endif
                    </div>
                </div>
                @error('title')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
                @error('slug')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-4">
                <label for="subtitle" class="block text-sm font-medium leading-6 text-white">Subtitle</label>
                <div class="mt-2">
                    <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <input @isset($show) disabled @endisset type="text" name="subtitle" value="{{ old('subtitle') ?: $oGameReview->subtitle }}" id="subtitle" class="flex-1 border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm sm:leading-6">
                    </div>
                </div>
                @error('subtitle')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-full">
                <label for="excerpt" class="block text-sm font-medium leading-6 text-white">Excerpt</label>
                <div class="mt-2">
                    <textarea @isset($show) disabled @endisset id="excerpt" name="excerpt" rows="3" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">{{ old('excerpt') ?: $oGameReview->excerpt }}</textarea>
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-400">Text shown on archive views and the game review header.</p>
                @error('excerpt')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-full">
                <input type="hidden" name="content" id="markdown-content">
                <input type="hidden" value="{{ $oGameReview->content }}" id="oldContent">
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
        <a href="{{ route('admin.game-reviews.index') }}" class="text-sm font-semibold leading-6 text-white">Cancel</a>
        <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
    </div>
@endif
