<x-layout title='About us'>
 <h1>{{$greeting}}</h1>
 <p>Owner is {{$owner}}</p>
 <ul>
    @foreach($ideas as $idea)
        <li>{{$idea->description}}</li>
    @endforeach
 </ul>
</x-layout>