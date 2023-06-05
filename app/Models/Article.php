<?php

namespace App\Models;

use App\Helpers\Traits\Cast;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property $id
 * @property $uid
 * @property $user_id
 * @property $title
 * @property $body
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 */
class Article extends Model
{
    use HasFactory, Cast;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'user_id'
    ];

    static public function frontend_list($query): Collection
    {
        return $query->get()->map(function (Article $article) {
            return [
                'uid' => $article->uid,
                'title' => $article->title,
                'created_at' => $article->created_at->toAtomString(),
                'updated_at' => $article->updated_at->toAtomString(),
            ];
        });
    }

    static public function frontend_fetch($query): Collection
    {
        return $query->get()->map(function (Article $article) {
            return [
                'uid' => $article->uid,
                'title' => $article->title,
                'body' => $article->body,
                'created_at' => $article->created_at->toAtomString(),
                'updated_at' => $article->updated_at->toAtomString(),
            ];
        });
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->uid = uid_article();
    }

    public function replicate(array $except = null)
    {
        $out = parent::replicate($except);
        $out->uid = uid_article();
        return $out;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
