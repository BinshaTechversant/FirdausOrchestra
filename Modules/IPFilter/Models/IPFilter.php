<?php

namespace Modules\IPFilter\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class IPFilter extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ipblacklists';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\IPFilter\database\factories\IPFilterFactory::new();
    }
}
