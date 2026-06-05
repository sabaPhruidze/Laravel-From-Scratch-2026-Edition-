<x-layout>

       {{--
       <?php die(var_dump($tasks)) ?>
       სკრიპტის შესრულების შეწყვეტას იწვევს die-- var_dump($tasks)
       — გამოაქვს $tasks ცვლადის სრული სტრუქტურა და მნიშვნელობები.
        die() — ამის შემდეგ მაშინვე აჩერებს PHP-ის მუშაობას.
        ამიტომ ეკრანზე დაინახავ $tasks-ის შიგთავსს და დანარჩენი კოდი აღარ შესრულდება.
        შესაბამისად აქ მხოლოდ $tasks value გამოჩნდება და აღარ layout .
        blade directives
        --}}
   @dump($tasks)
   <p>Helo</p>

    <?php if(count($tasks)) : ?>
        {{--
        აქ : ცვლის { ფიგურულ ფრჩხილს.ანუ:
        if (count($tasks)) :  იგივეა რაც:
        if (count($tasks)) {
        --}}
     <p>
     Yes, we have some tasks. How many?
     <?= count($tasks) ?>
     {{--
     ეს: <?= count($tasks) ?> ზუსტად იგივეა რაც:
         <?php echo count($tasks); ?>
     --}}
     tasks, in fact
    </p>
    <?php endif; ?>
    {{--

    რადგან : გამოვიყენეთ {-ის ნაცვლად, დახურვისთვის }-
    ის ნაცვლად უნდა დავწეროთ endif.
    <?php if (count($tasks)) : ?>
    ...
    <?php endif; ?>

    იგივეა რაც:

    <?php if (count($tasks)) { } ?>
    ეს უფრო მარტივად laravel ში ჩაიწერება ასე:
    --}}

    {{--
    Blade Directive არის სპეციალური ბრძანება, რომელიც
    იწყება @ ნიშნით და Laravel-ის Blade Template Engine-ს ეუბნება
    რა გააკეთოს.
    @foreach
    @endforeach

    @for
    @endfor

    @while
    @endwhile

    @include

    @extends

    @section
    @endsection
    --}}
    @if (count($tasks))
     <p>Yes, we have some tasks. How many?
     <?= count($tasks) ?> tasks in fact</p>
    @endif
</x-layout>
