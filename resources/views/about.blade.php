<x-layout title='About us'>
    <div class="w-full h-full flex flex-col items-center gap-4 justify-center">
        <h1>{{ $greeting }}</h1>
        <p>Owner is {{ $owner }}</p>
        {{-- <ul>
        @foreach ($ideas as $eachIdea)
            <li>{{ $eachIdea->description }}</li>
        @endforeach
    </ul>
    <hr />
    <p>{{ $selectedIdea }}</p> --}}
        <div class="card bg-neutral text-neutral-content w-96">
            <div class="card-body items-center text-center">
                <h2 class="card-title">Cookies!</h2>
                <p>We are using cookies for no reason.</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Accept</button>
                    <button class="btn btn-ghost">Deny</button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
