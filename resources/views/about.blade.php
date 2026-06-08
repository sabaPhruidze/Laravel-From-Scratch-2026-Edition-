<x-layout title='About us'>
    <h1>{{ $greeting }}</h1>
    <p>Owner is {{ $owner }}</p>
    <hr />
    {{-- <ul>
        @foreach ($ideas as $eachIdea)
            <li>{{ $eachIdea->description }}</li>
        @endforeach
    </ul>
    <hr />
    <p>{{ $selectedIdea }}</p> --}}
</x-layout>
