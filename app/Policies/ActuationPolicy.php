<?php

namespace App\Policies;

use App\User;
use App\Actuation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActuationPolicy
{
    use HandlesAuthorization;

    protected $adminRole = 'ticket';
    protected $customerRole = 'customer-ticket';
    protected $permission_list = [
        'list' => 'ticket-list',
        'show' => 'ticket-show',
        'create' => 'ticket-create',
        'update' => 'ticket-edit',
        'delete' => 'ticket-delete',
    ];

    /**
     * @param User $user
     * @return bool
     */
    public function role(User $user, $role){
        return $user->hasRole($role);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function list(User $user){
        if ($this->role($user, $this->adminRole)){
            return $user->hasDirectPermission($this->permission_list['list']);
        }elseif ($this->role($user, $this->customerRole)){
            return $user->hasDirectPermission($this->permission_list['list']);
        }
    }

    /**
     * Determine whether the user can view any = actuations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the = actuation.
     *
     * @param  \App\User  $user
     * @param  \App\=Actuation  $=Actuation
     * @return mixed
     */
    public function show(User $user, Actuation $Actuation)
    {
        if ($this->role($user, $this->adminRole)){
            return $user->hasDirectPermission($this->permission_list['show']);
        }elseif ($this->role($user, $this->customerRole)){
            if ($user->hasDirectPermission($this->permission_list['show'])){
                return $Actuation->ticket->customer_id === $user->customer_id;
            }
        }
    }

    /**
     * Determine whether the user can create = actuations.
     *
     * @param \App\User $user
     * @param Actuation $Actuation
     * @return mixed
     */
    public function create(User $user, Actuation $Actuation)
    {
        if ($this->role($user, $this->adminRole)){
            return $user->hasDirectPermission($this->permission_list['show']);
        }elseif ($this->role($user, $this->customerRole)){
            if ($user->hasDirectPermission($this->permission_list['show'])){
                return $Actuation->ticket->customer_id === $user->customer_id;
            }
        }
    }

    /**
     * Determine whether the user can update the = actuation.
     *
     * @param  \App\User  $user
     * @param  \App\=Actuation  $=Actuation
     * @return mixed
     */
    public function update(User $user, Actuation $Actuation)
    {
        if ($this->role($user, $this->adminRole)){
            return $user->hasDirectPermission($this->permission_list['show']);
        }elseif ($this->role($user, $this->customerRole)){
            if ($user->hasDirectPermission($this->permission_list['show'])){
                return $Actuation->ticket->customer_id === $user->customer_id;
            }
        }
    }

    /**
     * Determine whether the user can delete the = actuation.
     *
     * @param  \App\User  $user
     * @param  \App\=Actuation  $=Actuation
     * @return mixed
     */
    public function delete(User $user, Actuation $Actuation)
    {
        //
    }

    /**
     * Determine whether the user can restore the = actuation.
     *
     * @param  \App\User  $user
     * @param  \App\=Actuation  $=Actuation
     * @return mixed
     */
    public function restore(User $user, Actuation $Actuation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the = actuation.
     *
     * @param  \App\User  $user
     * @param  \App\=Actuation  $=Actuation
     * @return mixed
     */
    public function forceDelete(User $user, Actuation $Actuation)
    {
        //
    }
}
