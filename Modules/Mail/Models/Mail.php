<?php

namespace Modules\Mail\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'mails';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Mail\database\factories\MailFactory::new();
    }
}
