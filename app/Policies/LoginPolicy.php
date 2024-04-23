<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class LoginPolicy
{
    /**
     * Determine whether the user can view any models.
     */

   public function edit(User $user): bool
   {
       return true;
   }

    public function delete(User $user): Response
    {
         return $user->role === 'admin' ?
         Response::allow() : Response::deny('You are not authorized to delete a user');

    }

}
