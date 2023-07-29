<?php

namespace App\Models\Tenant;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;


    public function company(){
        return $this->belongsTo(User::class);
    }
    
    public static function getCustomColumns(): array
    {
        return [
            'id',
            'plan',
            'configuration',
        ];
    }
}
