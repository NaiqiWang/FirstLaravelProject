<?php

namespace App\Tagoal\Users;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->token = str_random(30);
        });
    }

    /**
     * Set the password attribute.
     *
     * @param string $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    /**
     * Confirm the user.
     *
     * @return void
     */
    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;
        $this->save();
    }

    public function statuses()
    {
        return $this->hasMany('App\Tagoal\Statuses\Status');
    }

    public function is(User $user)
    {
        return $this->name == $user->name;
    }

    public function comments()
    {
        return $this->hasMany('App\Tagoal\Comments\Comment');
    }

    public function phrases()
    {
        return $this->hasMany('App\Tagoal\Phrases\Phrase');
    }

    public function tags()
    {
        return $this->hasMany('App\Tagoal\Tags\Tag');
    }

    public function followedUsers()
    {
        return $this->belongsToMany('App\Tagoal\Users\User', 'follows', 'follower_id', 'followed_id')
                    ->withTimeStamps();
    }

    public function followers()
    {
        return $this->belongsToMany('App\Tagoal\Users\User', 'follows', 'followed_id', 'follower_id')
                    ->withTimeStamps();
    }

    public function isFollowedBy(User $otherUser)
    {
        $idsWithOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');

        $idsWithOtherUserFollows = array_values((array) $idsWithOtherUserFollows)[0];


        return in_array($this->id, $idsWithOtherUserFollows);
    }

}
