<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasActiveAccount
{
    /**
     * Boot the trait to apply the global scope.
     */
    protected static function bootHasActiveAccount()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where($builder->getQuery()->from . '.account_status', 'active');
        });
    }

    /**
     * Override the default delete method to peform a soft delete.
     * Sets account_status to 'removed'.
     */
    public function delete()
    {
        $this->account_status = 'removed';
        return $this->save();
    }

    /**
     * Scope a query to only include inactive users.
     */
    public function scopeInactive(Builder $query)
    {
        return $query->withoutGlobalScope('active')->where($this->getTable() . '.account_status', 'inactive');
    }

    /**
     * Scope a query to only include removed users.
     */
    public function scopeRemoved(Builder $query)
    {
        return $query->withoutGlobalScope('active')->where($this->getTable() . '.account_status', 'removed');
    }

    /**
     * Scope a query to include all users regardless of status.
     */
    public function scopeWithAllStatuses(Builder $query)
    {
        return $query->withoutGlobalScope('active');
    }
}
