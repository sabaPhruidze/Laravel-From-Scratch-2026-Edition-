<x-layout title='About us'>
    <h2>{{ $greeting }} {{ $owner }}</h2>
    <p>{{ $selectedIdea->description }}</p>
    <div class="mt-6 flex items-center gap-x-6">
        <a href="/ideas/index/{{ $selectedIdea->id }}/edit"
            class="cursor-pointer rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update
        </a>

    </div>
</x-layout>
