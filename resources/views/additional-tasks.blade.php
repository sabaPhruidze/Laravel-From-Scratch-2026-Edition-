<x-layout>
    <ul>
        @foreach ($tasks as $task)
            <li>{{$task}}</li>
        @endforeach
    </ul>
    {{--if else ივით რომ ჩავწერო foreach ქვევით:--}}
    <ul>
        @forelse ($tasks as $task)
        <li>{{$task}}</li>
    @empty
        <p>There are no additional tasks</p>
    @endforelse
    </ul>

    @if (!count($addTasks))
     <p>There are no additional tasks</p>
    @endif
    {{--@if ის ნაცვლად შეგვიძლია დავწეროთ @unless--}}
    @unless (count($addTasks))
        <p>There are no additional tasks</p>
    @endunless

    {{--თუ მიმდინარე მომხმარებელს აქვს $post-ის რედაქტირების უფლება,
    მაშინ აჩვენე Edit ლინკი.--}}
    @can('edit',$post)
        <a href="/posts/1/edit">Edit</a>
    @endcan

</x-layout>
