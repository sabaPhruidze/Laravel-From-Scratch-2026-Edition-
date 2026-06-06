<x-layout title='Main Page'> <!-- ამით ხვდება რომ ეს ფაილი არის slot -->
       <h1>Main Page</h1>
       {{$ideas}}
       @if ($ideas->count())  
       {{-- ესეც დაითვლის array $ideas--}}
       <div class="mt-6 text-white">
        <h2 class="font-bold">Your ideas</h2>
        <ul class="mt-6">
              @foreach($ideas as $idea)
                     <li class="text-sm">{{$idea->description}}</li>
              @endforeach
        </ul>
       </div>
       @endif
</x-layout><!-- x- ამით ხვდება რომ ეს ფაილი არის slot  -->
