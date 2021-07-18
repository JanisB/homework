<?php declare(strict_type=1);

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    public function getCategories()
    {
        return \DB::table($this->table)
        ->select(['id', 'title', 'description', 'created_at'])
        ->get();
    }

    public function getCategoriesById(int $id)
    {
        return \DB::table($this->table)
            ->find($id);
    }
}