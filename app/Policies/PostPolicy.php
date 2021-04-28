<?php

namespace App\Policies;

use App\Models\AuthenticatedUser;
use App\Models\Post;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PostPolicy
{
    use HandlesAuthorization;

    public function show(AuthenticatedUser $user)
    {
      // Any user can view a post
      return Auth::check();
    }

    public function list(AuthenticatedUser $user)
    {
      // Any user can list its own posts
      return Auth::check();
    }

    public function create(AuthenticatedUser $user)
    {
      // Any user can create a new post
      return Auth::check();
    }

    public function delete(AuthenticatedUser $user, Post $post)
    {
      // Only a post owner can delete it
      return $user->id == $post->user_id;
    }
}
