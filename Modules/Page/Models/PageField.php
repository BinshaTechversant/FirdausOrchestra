<?php

namespace Modules\Page\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageField extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'page_fields';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Page\database\factories\PageFieldFactory::new();
    }
}
