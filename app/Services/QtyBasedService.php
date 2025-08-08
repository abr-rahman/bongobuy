<?php

namespace App\Services;

use App\Enums\StatusEnum;
use App\Models\QtyBasedPrice;
use App\Services\Interfaces\QtyBasedServiceInterface;

class QtyBasedService implements QtyBasedServiceInterface
{
    public function all()
    {
        $item = QtyBasedPrice::orderBy('id', 'desc')->get();
        return $item;
    }

    public function store(array $attributes)
    {
        $item =  QtyBasedPrice::create($attributes);
        return $item;
    }
    public function find(int $id)
    {
        $item = QtyBasedPrice::find($id);
        return $item;
    }

    public function update(array $attributes, int $id)
    {
        $item = QtyBasedPrice::find($id);
        $updatedTask = $item->update($attributes);
        return $updatedTask;
    }

    public function delete(int $id)
    {
        $item = QtyBasedPrice::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $item = QtyBasedPrice::find($id);
        if ($item->status == StatusEnum::Inactive->value) {
            $item->status = StatusEnum::Active->value;
        }
        $item->save();
        return $item;
    }

    public function statusInactive(int $id)
    {
        $item = QtyBasedPrice::find($id);
        if ($item->status == StatusEnum::Active->value) {
            $item->status = StatusEnum::Inactive->value;
        }
        $item->save();
        return $item;
    }
}
