<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'active'];

    public function rules()
    {
        return [
            'name' => 'required|string',
            'address' => 'required|string',
            'active' => 'required|boolean'
        ];
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
