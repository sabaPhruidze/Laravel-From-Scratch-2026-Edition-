<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property-read Collection<int, Idea> $idea
 */
// ამ კლასს აქვს მხოლოდ წასაკითხი (read-only) property სახელად $ideas, რომელიც არის Collection და შეიცავს Idea ობიექტებს.
//ეს PHPDoc annotation-ია და მხოლოდ IDE-ს (VS Code, PhpStorm, Intelephense) ეხმარება. Laravel-ის მუშაობაზე პირდაპირ გავლენა არ აქვს.
#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class);
    }
}
