<x-layout title='About us'>
 <h1>{{$greeting}}</h1>
 <p>Owner is {{$owner}}</p>
 <ul>
    @foreach($ideas as $eachIdea)
        <li>{{$eachIdea->description}}</li>
    @endforeach
 </ul>
 <p>{{$selectedIdea}}</p>
</x-layout>