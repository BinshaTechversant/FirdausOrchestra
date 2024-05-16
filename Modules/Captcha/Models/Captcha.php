<?php

namespace Modules\Captcha\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Captcha extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'captchas';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Captcha\database\factories\CaptchaFactory::new();
    }
}
