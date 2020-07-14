<?php

namespace App\Policies;

use App\User;
use App\Article;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function delete(User $user, Article $article)
    {
        return $user->id==$post->user_id
            ?Response::allow()
            :Response::deny('You do not own this post');
    }
}
