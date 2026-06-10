<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Idea $idea): bool
    {
        //return false;  // ამ მომენტში არცერთის update საშუალებას არ მაძლევს 403ით
        //return $user->id === $idea->user_id; //ვამოწმებ და თუ შეესაბამება user id idea_ს user_id მაშინ მისცეს უფლებას
        //return $user->id === $idea->user_id ? Response::allow() : Response::denyAsNotFound(); // თუ სხვისი იდეის ნახვას ცდილობს 404 ერორს დაუწერს
        return $user->is($idea->user); // ესეც იგივეა Determine if two models have the same ID and belong to the same table.
    }
}
