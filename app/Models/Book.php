<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'isbn', 'value', 'store_id'];

    public function rules()
    {
        return [
            'name' => 'required|string',
            'isbn' => 'required|numeric',
            'value' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'], // Decimal validation
            'store_id' => 'exists:stores,id',
        ];
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }
}
