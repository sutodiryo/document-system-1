<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'parent_id',
        'name',
    ];

    protected $guarded = [];

    protected $cast = [
        'parents' => 'array'
    ];

    // protected $searchable = [
    //     'columns' => [
    //         'document_system_documents.sop_number' => 10,
    //         'document_system_documents.sop_add_win' => 10,
    //         'document_system_documents.sop_add_form' => 10,
    //         'document_system_documents.document_number' => 10,
    //         'document_system_documents.prefix_code' => 10,
    //         'document_system_documents.title' => 8,
    //         'departments.name' => 8,
    //         'users.name' => 8,
    //     ],
    //     'joins' => [
    //         'departments' => ['document_system_documents.department_id', 'departments.id'],
    //         'users' => ['document_system_documents.user_id', 'users.id'],
    //     ]
    // ];

    // public function parent()
    // {
    //     return $this->belongsTo(self::class, 'parent');
    // }

    public function parent()
    {
        return $this->belongsTo('App\Folder', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Folder', 'parent_id');
    }

    // public function getParentsAttribute()
    // {
    //     $parents = collect([]);

    //     $parent = $this->parent;

    //     while (!is_null($parent)) {
    //         $parents->push($parent);
    //         $parent = $parent->parent;
    //     }

    //     return $parents;
    // }
}
