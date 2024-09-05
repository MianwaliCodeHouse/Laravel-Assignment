<?php
namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasRole(['admin', 'sub-admin']);
    }

    public function view(User $user, Product $product)
    {
        return $user->hasRole(['admin', 'sub-admin']);
    }

    public function create(User $user)
    {
        return $user->hasRole('admin') || $user->hasRole('sub-admin');
    }

    public function update(User $user, Product $product)
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Product $product)
    {
        return $user->hasRole('admin');
    }
}
