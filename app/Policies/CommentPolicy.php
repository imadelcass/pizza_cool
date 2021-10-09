<?php

namespace App\Policies;

use App\Models\comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    // define methode to authorization deleting comment
    public function destroy(User $user,comment $comment)
    {
        return $comment->user_id == $user->id;
    }
}
