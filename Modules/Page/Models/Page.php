<?php

namespace Modules\Page\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pages';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Page\database\factories\PageFactory::new();
    }
    public function pageFields()
    {
        return $this->hasMany(PageField::class, 'page_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($page) {
            $page->pageFields()->delete();
        });
    }
}
