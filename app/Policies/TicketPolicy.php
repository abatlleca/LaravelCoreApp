<?php

namespace App\Policies;

use App\User;
use App\Ticket;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
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
     * Determine whether the user can view any = tickets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the = ticket.
     *
     * @param  \App\User  $user
     * @param  \App\=Ticket  $=Ticket
     * @return mixed
     */
    public function show(User $user, Ticket $Ticket)
    {
        if ($this->role($user, $this->adminRole)){
            return $user->hasDirectPermission($this->permission_list['show']);
        }elseif ($this->role($user, $this->customerRole)){
            if ($user->hasDirectPermission($this->permission_list['show'])){
                return $Ticket->customer_id === $user->customer_id;
            }
        }
    }

    /**
     * Determine whether the user can create = tickets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($this->role($user, $this->adminRole)){
            return $user->hasDirectPermission($this->permission_list['create']);
        }elseif ($this->role($user, $this->customerRole)){
            return $user->hasDirectPermission($this->permission_list['create']);
        }
    }

    /**
     * Determine whether the user can update the = ticket.
     *
     * @param  \App\User  $user
     * @param  \App\=Ticket  $=Ticket
     * @return mixed
     */
    public function update(User $user, Ticket $Ticket)
    {
        if ($this->role($user, $this->adminRole)){
            return $user->hasDirectPermission($this->permission_list['update']);
        }elseif ($this->role($user, $this->customerRole)){
            if ($user->hasDirectPermission($this->permission_list['update'])){
                return $Ticket->customer_id === $user->customer_id;
            }
        }
    }

    /**
     * Determine whether the user can delete the = ticket.
     *
     * @param  \App\User  $user
     * @param  \App\=Ticket  $=Ticket
     * @return mixed
     */
    public function delete(User $user, Ticket $Ticket)
    {
        //
    }

    /**
     * Determine whether the user can restore the = ticket.
     *
     * @param  \App\User  $user
     * @param  \App\=Ticket  $=Ticket
     * @return mixed
     */
    public function restore(User $user, Ticket $Ticket)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the = ticket.
     *
     * @param  \App\User  $user
     * @param  \App\=Ticket  $=Ticket
     * @return mixed
     */
    public function forceDelete(User $user, Ticket $Ticket)
    {
        //
    }
}
