<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Http\Requests\StoreIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd($id);// აჩვენებს რა ნომერზეა (კარგია პაგინაციისთვის)
        //$ideas = Idea::all();
        //$idea=Idea::where('id',$id)->first();
        // index ში იქნება ეს ესე რომ კონკრეტული user ის შესაბამისს მონაცემს აჩვენებს
        // $ideas = Idea::query()->where([
        //     'user_id' => Auth::id(),
        // ])->get();
        $ideas = Auth::user()->ideas; // ესეც იგივეს აკეთებს
        // უნდა წამოვიღოთ კონკრეტული user ის მონაცემები
        return view('ideas.index', [
            'ideas' => $ideas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd($id);// აჩვენებს რა ნომერზეა (კარგია პაგინაციისთვის)
        //$ideas = Idea::all();
        //$idea=Idea::where('id',$id)->first();
        $ideas = Idea::all();
        return view('ideas.create', [
            'ideas' => $ideas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdeaRequest $request)
    {
        // $request->validate([
        //     'description' => ['required', 'min:10']
        // ]);
        //validate დაყენებით აღარ იწვევს errors ცარიელის დამატებისას
        //min:10 მინიმუმ 10 ასო
        Idea::create([
            "description" => request("description"), //დავიჭირეთ იდეა
            'state' => 'pending', //??
            'user_id' => Auth::id(), //ან user ესე შემიძლია შევინახო
        ]); // welcome გვერდზე გამოჩნდება
        session()->push('ideas', request('description')); // გავუშვით sessionში. forms ში გამოჩნდება
        return redirect('/forms');
        // dd('hello'); dd ნიშნავს:
        //Dump → გამოიტანე მნიშვნელობა ეკრანზე.
        //Die → შეწყვიტე პროგრამის შესრულება.

        //dd(request()->all());ყველაფერს ვიღებთ. ეს წამოიღებს ტოკენს და ასევე ტესტს რაც ჩვწერეთ textareaში
        // CSRF- Cross site request forgery ერთი საიტიდან უშვებს ბრძანებას, რომელიც მეორეზე საიტზე, გვერდზე ან აპლიკაციაზე ახდენს გავლენას.
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        //dd($id);// აჩვენებს რა ნომერზეა (კარგია პაგინაციისთვის)
        //$idea=Idea::where('id',$id)->first();
        //$selectedIdea = Idea::findOrFail($id);  და ქვედა ერთიდაიგივეს აკეთებს
        // if (is_null($selectedIdea)) {
        //     abort(404); ვამოწმებთ ამ id ით არის თუ არა data database ში.
        // } თუ არა გაუშვებს abort404ს .404 Not Found ს დაწერს ეს.
        Gate::authorize('update', $idea); // ideaPolicy update გაეშვება ამით
        return view('ideas.show', [
            'greeting' => 'Ideas index',
            'owner' => 'Saba Ph',
            'selectedIdea' => $idea
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        return view('ideas.edit', [
            'idea' => $idea
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdeaRequest $request, Idea $idea)
    {
        $idea->update([
            'description' => request('description'),
        ]);
        return redirect("/ideas/index/{$idea->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect('/ideas/index');
    }
}
