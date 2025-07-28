<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use App\Models\Scopes\ActiveScope;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'username',
        'email',
        'password',
        'phone',
        'live_at',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new ActiveScope);
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class)
                    ->withTimestamps();
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function fullname(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::title("{$this->fname} {$this->lname}"),
        );
    }

    public function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => bcrypt($value),
        );
    }

    public function role(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value === 1 ? 'admin' : 'user',
        );
    }

    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }
}
