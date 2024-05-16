<?php

namespace Modules\Subscriber\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'subscribers';
    protected $fillable = ['name','email'];
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Subscriber\database\factories\SubscriberFactory::new();
    }
}
