<?php

namespace Modules\Template\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'templates';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Template\database\factories\TemplateFactory::new();
    }
}
