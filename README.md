# COVERED SUBJECT

# SET UP ENVIRONMENT ON WINDOWS AND LINUX

# ROUTING

# Layout files

# PASS DATA TO VIEWS

# BLADE DIRECTIVES

# FORMS (GET,POST,DELETE)

# DATABASES, MIGRATIONS AND ELOQUENT

- .env ეს არის ლოკალური ბაზა სადაც შეგვიძლია საიდუმლო
  ინფორმაცია შევინახოთ : მაგალითად database თან დამაკავშირებელი
  სტრინგი ან ტოკენი

- make:migration არის Laravel-ის ბრძანება, რომელიც ქმნის migration ფაილს.Migration არის ფაილი, სადაც წერ:Database-ში რა ცხრილი შეიქმნას ან შეიცვალოს . version control for database. მიგრაციის საშვალებით შეგვიძლია გავაკეთოთ:
    1. ახალი ცხრილის შექმნა
    2. ცხრილში ახალი სვეტის დამატება
    3. სვეტის წაშლა
    4. ცხრილის წაშლა
    5. სვეტების ტიპების განსაზღვრა

- php artisan make:migration create_ideas_table ეს შექმნის ახალ ფაილს აქ: database/migrations. შესაბამისად ვწერთ php artisan make:migration და ვარქმევთ შესაბამისს სახელს
- Laravel-ის ბრძანებების უმეტესობას წინ ვუწერთ:php artisan ...
- artisan არის Laravel-ის სპეციალური command ფაილი. Laravel project-ში არის ასეთი ფაილი: artisan ეს ფაილი Laravel-ის ბრძანებებს მართავს. ანუ როცა ვწერთ:php artisan
  ნიშნავს: PHP-ით გაუშვი Laravel-ის ბრძანებების სისტემა
- 0001 ფაილები migrations_ში არის Laravel-ის default migrations. Laravel ახალ პროექტში ავტომატურად გაძლევს რამდენიმე migration-ს,create_users_table ქმნის users ცხრილს database-ში. create_ideas_table ქმნის ideas ცხრილს.
- 'php artisan migrate'. tables ში რაიმე ცვლილებისას, მაგალითად ახალი column დამატებისას მჭირდება რომ გავუშვა migration ბრძანება
- SQLite Viewer extention დავაყენე შესაბამისად პირდაპირ vscode ში ვნახულობ database
- generic database query and than eloquent
- Eloquent არის Laravel-ის უფრო ლამაზი და მარტივი გზა database-თან სამუშაოდ. აქ იყენებ Model-ს. Model არის PHP class, რომელიც Laravel-ში database table-ს უკავშირდება.
- Generic database query რა არის? ეს არის database-თან მუშაობა პირდაპირ, Model-ის გარეშე.
- თუ migration ში ახალ columns გავუწერ აუცილებლად გავუშვა php artisan migrate:fresh ამის შემდეგ კი ჩავწერო php artisan migrate:refresh ამით დავკარგავთ ყველა შენახულ ინფრომაციას
- php artisan make:migration add_state_to_ideas_table -> php artisan migrate
- php artisan make:model Idea Ideas table ისთვის. ქმნის ახალ Model ფაილს

# HTTP Requests and REST
- GET,POST,PATCH,DELETE ვისწავლე როგორ შევქმნა და გამოვიყენო
- index - ყველას ჩვენება, show - კონკრეტულის ჩვენება ,
- edit - განახლებისთვის სივრცის მოწყობა, store - უშუალო განახლება
- destroy - წაშლა

# Controllers
- learned how to write create
- php artisan make:controller IdeaController ამით ვქმნით კონტროლერს სახელით თუმცა უმჯობესია  php artisan make:controller  გავუშვა შემდეგ მივუთითო თუ რისთვისაა კონტროლერი და ბოლოს Resource მოვნიშნო რომელიც წინასწარ განსზაღვრავს 7 მეთოდს
- web.php შიგნით რაც მეწერა გადამაქვს სწორი თანმიმდევრობIთ შესაბამისს class ში
- ფუნქციის შიგნით რაც გვეწერა უბრალოდ ის გადაგვაქვს controller ში. რითაც უფრო სუფთა ხდება კოდი

# Request Validation
- validation გამოყენება ხდება ასე:
- $request->validate(['description' => 'required']);
- ამით შეგვიძლია გავუწეროთ ზუსტად რა ტიპის ერორია რომ აჩვენოს
- @if ($errors->has('description'))
    {{-- ამით ვამოწმებთ არსებობს თუ არა descirption ან აკმაყოფილებს თუ არა validation --}}
    <p class="text-red-500">{{ $errors->first('description') }}</p>
- @endif
- https://laravel.com/docs/13.x/validation ვალიდაციაზე დამატებით
- error ჩაწერის 2 ხერხი input დან წამოსული 
- error_ის ცალკე კომპონენტად გატანა 
# Form Request Classes
- ამის გამოყენება არაფერს წყვეტს უბრალოდ შეგვიძლია გამოვიყენოთ
- php artisan make:request არის ვალიდაციის ფორმების შესაქმნელად
-store(StoreIdeaRequest $request) განვათავსე request ნაცვლად და ვალიდაციაც ხდება შესაბამისად StoreIdeaRequest_დან
- StoreIdeaRequest  ამის შიგნით მეთოდების განთავსებით შევინახავთ სათითაოდ ვალიდაციის ფორმებს 
- authorize() არ უნდა აბრუნებდეს false რადგან თუ დააბრუნებს ვეღარ გადავალ ვალიდაციის ეტაპზე 
- :attribute ამით შეგვიძლია გავიგოთ რომელი პროდუქტია გასასწორებელი
- ვალიდაციის წესები განსხვავებულია როგორც წესი post_ზე და put_ზე ამიტომ შეიძლება სხვადასხვა ვალიდაციის გამოყენება
- store და update ზე როგორც გავაკეთ ideaController ში ეგრე გავაკეთო თუ საერთო პატერნი მაქვს

# A Brief DaisyUI Detour
- DaisyUI არის Tailwind CSS-ის სემანტიკური კომპონენტების ბიბლიოთეკა (UI Library). ის არ არის დამოუკიდებელი CSS ფრეიმვორკი – ის მუშაობს როგორც Tailwind-ის პლაგინი
- Laravel-ის თანამედროვე ეკოსისტემა (Laravel Breeze, Jetstream) სტანდარტულად აქტიურად იყენებს Tailwind CSS-ს. სწორედ ამიტომ, DaisyUI იდეალურად ჯდება Laravel-ის პროექტებში და რამდენიმე მნიშვნელოვან პრობლემას აგვარებს:
- https://daisyui.com/docs/cdn/ cdn ით დავამატე layoutში.
- bootsrap tailwind ისთვის 
- navigation ის ცალკე კომპონენტის შექმნა და navigation ლინკების განთავსება
