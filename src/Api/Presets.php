<?php

namespace P0n0marev\Ispmanager6\Api;

use P0n0marev\Ispmanager6\Entities\PresetEntity;
use P0n0marev\Ispmanager6\Entities\UserEntity;

class Presets extends AbstractApi
{
    /**
     * @return PresetEntity[]
     */
    public function list(): array
    {
        $this->request('preset');

        return $this->adapter->getList(PresetEntity::class);
    }

    public function create(UserEntity $userEntity): void
    {
        $this->request('preset.edit', array_merge(['sok' => 'ok'], $userEntity->toArray()));
    }

    public function get(string $name): PresetEntity
    {
        $this->request('preset.edit', ['elid' => $name]);

        return $this->adapter->getElement(PresetEntity::class);
    }
}