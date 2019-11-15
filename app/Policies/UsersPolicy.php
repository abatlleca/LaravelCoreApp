<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    protected $role = 'user';
    protected $permission_list = [
        'list' => 'user-list',
        'show' => 'user-show',
        'create' => 'user-create',
        'update' => 'user-edit',
        'delete' => 'user-delete',
    ];

    /**
     * @param User $user
     * @return bool
     */
    public function role(User $user){
        return $user->hasRole($this->role);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function list(User $user){
        if ($this->role($user)){
            return $user->hasDirectPermission($this->permission_list['list']);
        }
    }

    /**
     * Determine whether the user can view any menus.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can show a menu.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function show(User $user)
    {
        if ($this->role($user)){
            return $user->hasDirectPermission($this->permission_list['show']);
        }
    }

    /**
     * Determine whether the user can create menus.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($this->role($user)){
            return $user->hasDirectPermission($this->permission_list['create']);
        }
    }

    /**
     * Determine whether the user can update the menu.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        if ($this->role($user)){
            return $user->hasDirectPermission($this->permission_list['update']);
        }
    }

    /**
     * Determine whether the user can delete the menu.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        if ($this->role($user)){
            return $user->hasDirectPermission($this->permission_list['delete']);
        }
    }

    /**
     * Determine whether the user can restore the menu.
     *
     * @param  \App\User  $user
     * @param  \App\User $user1
     * @return mixed
     */
    public function restore(User $user, User $user1)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the menu.
     *
     * @param  \App\User  $user
     * @param  \App\User $user1
     * @return mixed
     */
    public function forceDelete(User $user, User $user1)
    {
        //
    }
}
