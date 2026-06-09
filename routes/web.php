<?php


//use Illuminate\Support\Facades\DB;  როცა დავწერ DB, იგულისხმე Laravel-ის DB კლასი.

use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route; // როცა დავწერ Route, იგულისხმე Laravel-ის Route კლასი.
use App\Models\Idea;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\SessionsController;

Route::get('/', function () {
    //$ideas = DB::table('ideas') -> get(); // database დან მივიღე data table 'ideas გან'
    //dd($ideas);
    //eloquent - ORM -active recond implementation
    //$ideas =Idea::where('state','pending')->get(); //Idea::all() Idea::(1);
    //dd($ideas); attribute ში გამოჩნდება dump var ივით.
    //return $ideas;
    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            //dd($state); //http://127.0.0.1:8000/?state=pending ამ ლინკზე აჩვენებს pendins თუ active დავუწერ activeს ??????????
            $query->where('state', $state);
        })
        ->get();
    // return view('welcome',[
    //     'ideas'=> $ideas,
    // ]);
    // return $ideas ასე აბრუნებს როგორც json ,შემდეგ კონკრეტული რომ მივიღოთ $ideas[0]->description

    return view('welcome', [
        'ideas' => $ideas,
    ]);
});
Route::get('/prisma', function () {
    return view('prisma', [
        'greeting' => 'hello',
        'person' => request('person', 'world'),
        // თუ link ში არ არის person ის განმარტება ჩაწერს worldს
    ]);
});
// shortly written
Route::get('/about', function () {
    // '/about' ნაცვლად ნებიმმიერი შემიძლია რომ მეწეროს
    // $ideas = Idea::all();
    return view('about', [
        'greeting' => 'About us',
        'owner' => 'Saba Ph',
        //'ideas' => $ideas
    ]);
});
Route::get('/about/{id}', function ($id) { // '/about' ნაცვლად ნებიმმიერი შემიძლია რომ მეწეროს . $id {id} აქ არის დინამიური id მაგ: 1,2,4...
    //dd($id);// აჩვენებს რა ნომერზეა (კარგია პაგინაციისთვის)
    $ideas = Idea::all();
    //$idea=Idea::where('id',$id)->first();
    $selectedIdea = Idea::find($id);
    return view('about', [
        'greeting' => 'About us',
        'owner' => 'Saba Ph',
        'ideas' => $ideas,
        'selectedIdea' => $selectedIdea
    ]);
});


//index
Route::get('/ideas/index', [IdeaController::class, 'index']); // '/about' ნაცვლად ნებიმმიერი შემიძლია რომ მეწეროს . $id {id} აქ არის დინამიური id მაგ: 1,2,4...
//create
Route::get('/ideas/create', [IdeaController::class, 'create']); // '/about' ნაცვლად ნებიმმიერი შემიძლია რომ მეწეროს . $id {id} აქ არის დინამიური id მაგ: 1,2,4...


//show one
// {idea} შეიძლება იყოს 2,3.... და Idea ში იპოვის შესაბამის და მოგვაწვდის $idea აქ
// /{idea} და $idea ერთი და იგივეა აქ . იგივე უნდა ეწეროს სახელი. Route Model Binding.
//Route Model Binding ნიშნავს, რომ Laravel თვითონ პოულობს ბაზიდან მოდელს (ჩანაწერს) URL-ში გადაცემული ID-ის მიხედვით.
Route::get('/ideas/index/{idea}', [IdeaController::class, 'show']);
//edit for visual
Route::get('/ideas/index/{idea}/edit', [IdeaController::class, 'edit']);
//update
Route::patch('/ideas/index/{idea}', [IdeaController::class, 'update']);
// destroy
Route::delete('/ideas/index/{idea}', [IdeaController::class, 'destroy']);

// greeting is like a prop that pass it's data by writing that
//$greeting
Route::view('/contact', 'contact', [
    'phone' => request('number')
]);
// query string ში რომ ჩანდეს და ის ამოვიღოთ მაგ: ?person=frank
Route::get('/tasks', function () {
    return view('tasks', [
        'tasks' => [
            'Go to the market',
            'Walk the dog',
            'Match a video toturial'
        ],
    ]);
});
Route::get('/additional-tasks', function () {
    return view('additional-tasks', [
        'tasks' => [
            'Go to the market',
            'Walk the dog',
            'Match a video toturial'
        ],
        'addTasks' => [],
    ]);
});
Route::get('/forms', function () {
    $ideas = session()->get('ideas', []); // თუ არაფერი ეწერება ცარიელ array ის დააბრუნებს
    return view('forms', [
        'ideas' => $ideas
    ]);
});
//Session არის დროებითი საცავი სერვერზე, სადაც Laravel/PHP
//კონკრეტული მომხმარებლის მონაცემებს ინახავს რამდენიმე request-ს შორის
// post ის დროს არ მჭირდება ფაილის შექმნა POST /ideas მხოლოდ მონაცემს
//ინახავს Session-ში და შემდეგ /forms-ზე აბრუნებს მომხმარებელს.
//store
Route::post('/ideas', [IdeaController::class, 'store']);
//-> ნიშნავს: ობიექტის შიგნით არსებული method-ის ან property-ის გამოძახებას.
Route::delete('/ideas', function () {
    session()->forget('ideas');
    //Idea::truncate(); ესეც შლის უბრალოდ მაშინ როცა eloquent ით ხდება მიღებაც
    return redirect('/forms');
});

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);
Route::delete('/logout', [SessionsController::class, 'destroy']);
