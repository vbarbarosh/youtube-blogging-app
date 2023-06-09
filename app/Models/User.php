<?php

namespace App\Models;

use App\Exceptions\NotAuthorized;
use App\Exceptions\UserFriendlyException;
use App\Helpers\Traits\Cast;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property $id
 * @property $uid
 * @property $name
 * @property $email
 * @property $password
 * @property $password_recovery_token
 * @property $remember_token
 * @property $is_debug_eval_allowed
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $email_verified_at
 *
 * @property EloquentCollection|Article[] $articles
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Cast;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'password',
        'password_recovery_token',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_debug_eval_allowed' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    /**
     * @throws UserFriendlyException
     */
    static public function register($email, $password): User
    {
        if (User::query()->where('email', $email)->exists()) {
            throw new UserFriendlyException("User with the specified email already exists: [$email]");
        }
        $user = new User();
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();
        return $user;
    }

    static public function frontend_fetch($query)
    {
        return $query->get()->map(function (User $user) {
            return [
                'uid' => $user->uid,
                'email' => $user->email,
            ];
        });
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->uid = uid_user();
    }

    public function replicate(array $except = null)
    {
        $out = parent::replicate($except);
        $out->uid = uid_user();
        return $out;
    }

    /** @throws NotAuthorized */
    public function should_debug_eval_allowed()
    {
        if (!$this->is_debug_eval_allowed) {
            throw new NotAuthorized();
        }
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
