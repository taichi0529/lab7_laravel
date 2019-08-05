<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Work;
use Illuminate\Auth\Access\HandlesAuthorization;

class MyWork
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the work.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Work  $work
     * @return mixed
     */
    public function view(User $user, Work $work)
    {
        //
    }

    /**
     * Determine whether the user can create works.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the work.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Work  $work
     * @return mixed
     */
    public function update(User $user, Work $work)
    {
        //
        return $user->id == $work->owner_id;
    }

    /**
     * Determine whether the user can delete the work.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Work  $work
     * @return mixed
     */
    public function delete(User $user, Work $work)
    {
        //
    }
}
