<x-layout>
    <form method='POST' action="/ideas/index/{{ $idea->id }}">
        {{-- method spoofing --}}
        @csrf
        @method('PATCH')
        {{-- დაემატება hidden input --}}
        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">edit your idea</label>
            <div class="mt-2">
                {{-- dd(request()->all()); ეს წამოიღებს ტოკენს და ასევე ტესტს რაც ჩვწერეთ textareaში --}}
                <textarea id="description" name="description" rows="3"
                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 border-3 border-amber-400">
                {{ $idea->description }}
                </textarea>
                <x-forms.error name='description' />
                {{--  <x-forms.error name='description' />  დაგვიწერს errorს მაშინ როცა ან არაფერი გვექნება განახლებისას ან 10 ნიშანზე ნაკლები გვექნება --}}
            </div>

        </div>

        <div class="mt-6 flex items-center gap-x-6">
            <button type="submit"
                class="cursor-pointer rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update</button>
            <button type="submit" form="delete-idea-form"
                class="cursor-pointer rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">Delete</button>
        </div>
    </form>
    {{-- id ის გამოყენებით დავაკავშირე ეს form  ღილაკთან form="delete-idea-form" --}}
    <form id='delete-idea-form' method="POST" action="/ideas/index/{{ $idea->id }}">
        @csrf
        @method('DELETE')
    </form>

</x-layout>
