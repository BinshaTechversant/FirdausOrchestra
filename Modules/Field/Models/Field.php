<?php

namespace Modules\Field\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'fields';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Field\database\factories\FieldFactory::new();
    }
}
