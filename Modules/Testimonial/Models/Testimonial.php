<?php

namespace Modules\Testimonial\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'testimonials';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Testimonial\database\factories\TestimonialFactory::new();
    }
}
