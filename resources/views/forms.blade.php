<x-layout>
    <form method='POST' action="/ideas">
        @csrf
        {{--
        ეს csrf ააქტიურებს დაცვას და form ში ამატებს hidden input ს ტოკენით
        @csrf ავტომატურად ამატებს ასეთ hidden input-ს: Laravel მერე ამოწმებს:
        ფორმიდან მოსული _token == session-ში შენახულ token-ს?
        თუ ემთხვევა — request გადის , თუ არ ემთხვევა — Laravel აგდებს 419 Page Expired შეცდომას.
        --}}
        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">New ideas</label>
            <div class="mt-2">
                {{-- dd(request()->all()); ეს წამოიღებს ტოკენს და ასევე ტესტს რაც ჩვწერეთ textareaში --}}
                <textarea id="description" name="description" rows="3"
                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 border-3 border-amber-400"></textarea>
            </div>
            <p class="mt-3 text-sm/6 text-gray-400">Have an idea you want to save for later?</p>
        </div>
        <div class="mt-6 flex items-center gap-x-6">
            <button type="submit"
                class="cursor-pointer rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>

        </div>
    </form>
    @unless (count($ideas))
        <p>There are no ideas written</p>
    @endunless
    @if (count($ideas))
        <ul class="w-full flex justify-between gap-2 flex-wrap">
            @foreach ($ideas as $idea)
                <li>{{ $idea }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action='/ideas'>
        @csrf
        @method('DELETE')
        <button type='submit'
            class="cursor-pointer rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">Delete</button>
    </form>
</x-layout>
