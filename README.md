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
- php artisan make:controller IdeaController ამით ვქმნით კონტროლერს სახელით თუმცა უმჯობესია php artisan make:controller გავუშვა შემდეგ მივუთითო თუ რისთვისაა კონტროლერი და ბოლოს Resource მოვნიშნო რომელიც წინასწარ განსზაღვრავს 7 მეთოდს
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
- StoreIdeaRequest ამის შიგნით მეთოდების განთავსებით შევინახავთ სათითაოდ ვალიდაციის ფორმებს
- authorize() არ უნდა აბრუნებდეს false რადგან თუ დააბრუნებს ვეღარ გადავალ ვალიდაციის ეტაპზე
- :attribute ამით შეგვიძლია გავიგოთ რომელი პროდუქტია გასასწორებელი
- ვალიდაციის წესები განსხვავებულია როგორც წესი post*ზე და put*ზე ამიტომ შეიძლება სხვადასხვა ვალიდაციის გამოყენება
- store და update ზე როგორც გავაკეთ ideaController ში ეგრე გავაკეთო თუ საერთო პატერნი მაქვს

# A Brief DaisyUI Detour

- DaisyUI არის Tailwind CSS-ის სემანტიკური კომპონენტების ბიბლიოთეკა (UI Library). ის არ არის დამოუკიდებელი CSS ფრეიმვორკი – ის მუშაობს როგორც Tailwind-ის პლაგინი
- Laravel-ის თანამედროვე ეკოსისტემა (Laravel Breeze, Jetstream) სტანდარტულად აქტიურად იყენებს Tailwind CSS-ს. სწორედ ამიტომ, DaisyUI იდეალურად ჯდება Laravel-ის პროექტებში და რამდენიმე მნიშვნელოვან პრობლემას აგვარებს:
- https://daisyui.com/docs/cdn/ cdn ით დავამატე layoutში.
- bootsrap tailwind ისთვის
- navigation ის ცალკე კომპონენტის შექმნა და navigation ლინკების განთავსება
- შემოვიტანე card daisyui დან და გამოვიყენე index ზე
- btn ების დიდი არჩევანია გამზადებული ფერების არსებობს textarea და ა.შ უნდა გადავხედ ოფიცილაურ საიტს
- <textarea id="description" name="description" rows="3" class="textarea w-full @error('description') textarea-error @enderror"> textarea ზე error ის შემთხვევაში შესაბამიასდ რომ გასტილოს

# Authentication Explained

- შევქმენი ახალი controller : RegisterUserController.php და დამატებით გავაკეთე register გვერდი , routes ში დავაკავშირე და შემდეგ nav კომპონენტში დავამატე /register მისამართი
- registeruserController ში გავუწერე ზუსტად რა ვალიდაციის ფორმები უნდა გაიაროს
- hashing password
- added logout button
- დავამატე login და მუშაობს

# Require Authentication With Middleware

- foreignIdFor - Laravel-ის migration helper-ია, რომელიც ავტომატურად ქმნის foreign key სვეტს კონკრეტული Model-ისთვის.
- ideas/index თან დაკავშირებული ყველა route ხელმისაწვდომი უნდა იყოს მხოლოდ მაშინ როცა პირი არის ავთენტიფიცირებული
- middleware ით როგორ შეგვიძლია რომ განვუსაზღვროთ სად გადაამისამართოს როცა ავთენტიფიცირებული არ არის პირი boostrap + web.php
- guest ბლოკავს რა არ უნდა იყოს ხელმისაწვდომი თუ პირი არის authentificated
- idea controller ის store ში 'user_id' => Auth::id(), ამის გაწერით უკვე უნიკლაური id ით შესაძლებელი ხდება ამოიცნონ რომელი user ის მიერ ჩაიწერა იდეა

# Eloquent Relationships

- php artisan tinker არის Laravel-ის ინტერაქტიული PHP კონსოლი. მისი საშუალებით შეგიძლია Laravel-ის კოდი გაუშვა პირდაპირ ტერმინალიდან, Route-ის ან Controller-ის შექმნის გარეშე.
  გამოიყენება user შესაქმნელად , ყველა user სანახავად, მოსაძებნად და ა.შ
- php artisan tinker შემდეგ შემიძლია ჩავწერო პირველი idea სანახავად:
- $idea = App\Models\Idea::first();
- $idea -> user;
- $user = App\Models\User::first();

# Authorization Using Gates

- Laravel-ში Gate არის მარტივი მექანიზმი, რომელიც ამოწმებს, აქვს თუ არა ავტორიზებულ მომხმარებელს კონკრეტული მოქმედების შესრულების უფლება. ის საუკეთესოა მაშინ, როცა მოქმედება არ არის მიბმული კონკრეტულ მოდელთან (მაგალითად, ადმინ პანელში შესვლა) ან როცა მარტივი ლოგიკის გაწერა გინდა.

- როგორც წესი, განვსაზღვრავთ app/Providers/AppServiceProvider.php ფაილის boot მეთოდში.

- გეითის შემოწმება შეგვიძლია კოდის რამდენიმე ადგილას:კონტროლერში (Controller),ბლეიდ შაბლონში (Blade View),
- ადმინის უფლება (Gate::before) რეალურ პროექტებში ხშირად გჭირდება, რომ მთავარ ადმინისტრატორს (Super Admin) ყველა კარები ავტომატურად გაეღოს და კოდმა მასზე საერთოდ არ დაიწყოს იმის შემოწმება, ეკუთვნის თუ არა კონკრეტული პოსტი მას. ამისთვის ვიყენებთ Gate::before
- სტანდარტულად გეითი აბრუნებს მხოლოდ true ან false-ს (ანუ „კი“ ან „არა“). მაგრამ თუ გინდა, რომ მომხმარებელს ზუსტად აუხსნა, რატომ არ აქვს უფლება, უნდა გამოიყენო Response ობიექტი
- კონტროლერში ამ შეტყობინების წაკითხვა ასე შეგიძლია: Gate::inspect('edit-settings') ან პირდაპირ Gate::authorize(), რომელიც ბლოკირებისას სწორედ ამ ტექსტს გამოაჩენს ეკრანზე.
- Authorization Using Gates არის Laravel-ის მექანიზმი (ფუნქციონალი) უფლებების შესამოწმებლად.
- AppServiceProvider არის ჩვეულებრივი ფაილი (კლასი), სადაც ამ მექანიზმს ვრთავთ და მის წესებს ვწერთ.
- გეითი არის თავად „წესი“, ხოლო AppServiceProvider არის „რვეული“
- -> მაგ: $user->is_super_admin ეს ისარი მიგვითითებს, რომ გვინდა $user ობიექტიდან ავიღოთ მისი კონკრეტული თვისება
- შევქმენი admin link და დავამატე შესაბამისი route , view's გარეშე

# Authorization Using Policies

- თუ Gate არის ერთი კონკრეტული დაცვის თანამშრომელი, Policy (პოლისი) არის მთელი უსაფრთხოების დეპარტამენტი, რომელიც მიმაგრებულია კონკრეტულ მოდელზე (მაგალითად, პოსტებზე, პროდუქტებზე ან მომხმარებლებზე).

- როცა აპლიკაცია იზრდება, AppServiceProvider-ში ყველა გეითის ჩაწერა კოდს ქაოსურად აქცევს. პოლისები გვეხმარება, რომ ავტორიზაციის ლოგიკა დავაჯგუფოთ კონკრეტული მოდელის გარშემო.
- პოლისის შესაქმნელად: php artisan make:policy PostPolicy --model=Post
- პოლისების სერვის პროვაიდერში რეგისტრაცია აღარ გჭირდება. თუ პოლისს ჰქვია PostPolicy და მოდელს Post, Laravel მათ ავტომატურად აკავშირებს ერთმანეთთან.
