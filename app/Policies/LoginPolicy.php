<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class LoginPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function registerForm(User $user): Response
   {
       return $user->role === 'admin' ? 
       Response::allow() : Response::deny('You are not authorized to register a user');

   }
   public function register(User $user): Response
   {
       return $user->role === 'admin' ? 
       Response::allow() : Response::deny('You are not authorized to register a user');

   }

   public function edit(User $user): Response
   {
       return $user->role === 'admin' ? 
       Response::allow() : Response::deny('You are not authorized to edit a user');

   }

    public function delete(User $user): Response
    {
         return $user->role === 'admin' ? 
         Response::allow() : Response::deny('You are not authorized to delete a user');
    
    }

}
