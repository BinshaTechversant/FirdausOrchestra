<?php

namespace Modules\General\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class General extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'generals';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\General\database\factories\GeneralFactory::new();
    }
}
