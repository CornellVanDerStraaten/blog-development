<div class="space-y-12">
    <div class="border-b border-white/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-white">Game</h2>
        <p class="mt-1 text-sm leading-6 text-gray-400">Good luck playing your next game!</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="title" class="block text-sm font-medium leading-6 text-white">Name</label>
                <div class="mt-2">
                    <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <input type="text" @isset($show) disabled @endisset value="{{ old('name') ?: $oGame->name }}" name="name" id="name" class="flex-1 border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm sm:leading-6">
                    </div>
                </div>
                @error('name')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-4">
                <label for="rating" class="block text-sm font-medium leading-6 text-white">Rating</label>
                <div class="mt-2">
                    <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <input type="text" @isset($show) disabled @endisset value="{{ old('rating') ?: $oGame->rating }}" name="rating" id="rating" class="flex-1 border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm sm:leading-6">
                    </div>
                </div>
                @error('rating')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-4">
                <label for="game_status_id" class="block text-sm font-medium leading-6 text-white">Status</label>
                <div class="mt-2">
                    <div class="flex rounded-md">
                        <select required id="game_status_id" name="game_status_id" class="mt-2 block w-full rounded-md  ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500  bg-white/5 border-0 py-1.5 pl-3 pr-10 text-gray-200  sm:text-sm sm:leading-6">
                            @foreach ($ooGameStatuses as $oGameStatus)
                                <option @if((old('game_status_id') ?: $oGame->game_status_id) == $oGameStatus->id) selected @endif value="{{$oGameStatus->id}}" >{{$oGameStatus->name}}</option>
                             @endforeach
                        </select>
                    </div>
                </div>
                @error('game_status_id')
                <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </div>
</div>

@if(!isset($show))
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="{{ route('admin.games.index') }}" class="text-sm font-semibold leading-6 text-white">Cancel</a>
        <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
    </div>
@endif
