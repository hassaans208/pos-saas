<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
protected $table = 'tenants';
    protected $fillable = [
        'ip_address'
    ];
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

    public function user(){
        return $this->hasOne(User::class, 'std_id');
    }
}
