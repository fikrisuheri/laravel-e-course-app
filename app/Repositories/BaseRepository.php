<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
use DOMDocument;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BaseRepository implements BaseRepositoryInterface
{

    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    // CORE FUNCTION 
    public function get()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->findorfail($id);
    }

    public function store($attributes, $isFile = false, $field = null, $folder = null)
    {
        if ($isFile == true) {
            foreach ($field as $key => $value) {
                if (request()->file($value)) {
                    $attributes[$value] = request()->file($value)->store('file/' . $folder, 'public');
                } else if ($attributes[$value]) {
                    $attributes[$value] = $attributes[$value];
                }
            }
        }
        return $this->model->create($attributes);
    }

    public function update($id, $attributes, $isFile = false, $field = null, $folder = null)
    {
        $model = $this->model->find($id);
        if ($isFile == true) {
            if (isset($field)) {
                foreach ($field as $key => $value) {
                    if (request()->file($value)) {
                        File::delete('storage/' . $model[$value]);
                        $attributes[$value] = request()->file($value)->store('file/' . $folder, 'public');
                    }
                }
            }
        }
        $model->update($attributes);
        return $model;
    }

    public function delete($id, $isFile = false, $field = null)
    {
        $model = $this->model->find($id);
        if ($isFile == true) {
            File::delete('storage/' . $model[$field]);
        }
        return $model->delete();
    }
    // END CORE FUNCTION

    public function Query()
    {
        return $this->model->query();
    }

    // Text EDITOR 
   
};