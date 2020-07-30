<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderDetailPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        # code...
    }
    
    /**
     * Determine whether the user can view any order details.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the order detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\OrderDetail  $orderDetail
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->role == 3;
    }

    /**
     * Determine whether the user can create order details.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 3;
    }

    /**
     * Determine whether the user can update the order detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\OrderDetail  $orderDetail
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->role == 3;
    }

    /**
     * Determine whether the user can delete the order detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\OrderDetail  $orderDetail
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->role == 3;
    }

    /**
     * Determine whether the user can restore the order detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\OrderDetail  $orderDetail
     * @return mixed
     */
    public function restore(User $user)
    {
        return $user->role == 3;
    }

    /**
     * Determine whether the user can permanently delete the order detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\OrderDetail  $orderDetail
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        return $user->role == 3;
    }
}
