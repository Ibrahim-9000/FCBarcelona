<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqItem extends Model
{
    protected $fillable = ['question', 'answer', 'faq_category_id'];

    public function faqCategory()
    {
        return $this->belongsTo(FaqCategory::class);
    }
}