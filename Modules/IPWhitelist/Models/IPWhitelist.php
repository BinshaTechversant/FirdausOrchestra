<?php

namespace Modules\IPWhitelist\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class IPWhitelist extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ipwhitelists';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\IPWhitelist\database\factories\IPWhitelistFactory::new();
    }
}
