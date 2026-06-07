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
- თუ migration ში ახალ columns გავუწერ აუცილებლად გავუშვა php artisan migrate:fresh ამის შემდეგ კი ჩავწერო php artisan migrate:refresh ამით დავკარგავთ ყველა შენახულ ინფრომაციას
- php artisan make:migration add_state_to_ideas_table -> php artisan migrate
- php artisan make:model Idea Ideas table ისთვის. ქმნის ახალ Model ფაილს
  -Eloquent არის Laravel-ის უფრო ლამაზი და მარტივი გზა database-თან სამუშაოდ. აქ იყენებ Model-ს. Model არის PHP class, რომელიც Laravel-ში database table-ს უკავშირდება.
- Generic database query რა არის? ეს არის database-თან მუშაობა პირდაპირ, Model-ის გარეშე.
