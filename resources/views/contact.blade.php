<x-layout title='Contact us'>
       <br/>
       <x-card class='max-w-400'> 
        <!-- merge ის გამო x-card card ს დაემატება max-w-400c-->
         <h1 class="mt-10">Placehoder for the contact form</h1>
         <p>Phone: {{$phone}}</p>
         {{--phone will be received from url ?number= 
         phone შემეძლო ჩამწერა  <?php person ?> ში და ესეც იმუშავებდა
         მაგრამ პრობლემა არის ის რომ ამ შემთხვევაში დამატებით უნდა გავუწეროთ
         html უსაფრთხოების ატრიბუტი რადგან ჩვეულებრივ შეგვეძლება ისე 
         JS გაშვება, ეხლა კი როგორც ვწერთ curly brackets ისედაც იცავს და ამას 
         ჰქვია blade
         --}}
       </x-card>
</x-layout>