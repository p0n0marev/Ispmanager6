<?php

namespace P0n0marev\Ispmanager6\Api;

use P0n0marev\Ispmanager6\Entities\PresetEntity;

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

    public function create(PresetEntity $presetEntity): void
    {
        $this->request('preset.edit', array_merge(['sok' => 'ok'], $presetEntity->toArray()));
    }

    public function update(PresetEntity $presetEntity): void
    {
        $this->request('preset.edit', array_merge(['sok' => 'ok', 'elid' => $presetEntity->name], $presetEntity->toArray()));
    }

    public function get(string $name): PresetEntity
    {
        $this->request('preset.edit', ['elid' => $name]);

        return $this->adapter->getElement(PresetEntity::class);
    }

    public function delete(string $name): void
    {
        $this->request('preset.delete', ['elid' => $name]);
    }
}