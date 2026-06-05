<div  {{$attributes->merge(['class' => 'card'])}}>
    <!-- 
      merge კომპონენტს ყოველთვის ჰქონდეს card კლასი, 
      მაგრამ თუ მომხმარებელმა დამატებითი class-ებიც გადმომცა,
      ისინიც დაამატე merge-ის გარეშე თუ დაწერდი: 
      <div class="card"> მაშინ: <x-card class="max-w-400"> 
      იგნორირებული იქნებოდა.
      <div class="card max-w-400"> თუ დავუწერთ merge თი
      -->
 {{$slot}}
</div>