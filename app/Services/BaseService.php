<?php

namespace App\Services;

use App\Exceptions\BaseException;
use App\Exceptions\CustomExceptionWithMessage;
use App\Exceptions\NotFoundException;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Spatie\FlareClient\Http\Exceptions\NotFound;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BaseService
{
    protected $model;

    public function getAll($filters = [])
    {
        $data = $this->model::query();
        foreach ($filters as $key => $value) {
            $data = $data->where($key, $value);
        }
        $data = $data->get();
        return $data;
    }

    public function getOne($id)
    {
        $object = $this->model::find($id);
        if (!$object) {
            throw new NotFoundException();
        }
        return $object;
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($id, $data)
    {
        $object = $this->model::find($id);
        if (!$object) {
            throw new NotFoundException();
        }
        $object->update($data);
        return $object;
    }

    public function delete($id)
    {
        $object = $this->model::find($id);
        if (!$object) {
            throw new NotFoundException();
        }
        return $object->delete();
    }
}
