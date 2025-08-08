<?php

namespace App\Services;

use App\Enums\StatusEnum;
use App\Models\Color;

use function is_integer;

Class ColorService
{
    public function all()
    {
        $item = Color::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  Color::create($attributes);
        return $item;
    }

    public function find(int $id)
    {
        $item = Color::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = Color::find($id);
        $updatedTask = $item->update($attributes);
        return $updatedTask;
    }

    public function delete(int $id)
    {
        $item = Color::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = Color::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = Color::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
