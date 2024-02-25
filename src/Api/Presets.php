<?php

namespace P0n0marev\Ispmanager6\Api;

use P0n0marev\Ispmanager6\Message\ResponseMediator;
use P0n0marev\Ispmanager6\Entities\PresetEntity;

class Presets extends AbstractApi
{
    /**
     * @return PresetEntity[]
     */
    public function list()
    {
        $rs = $this->request('preset');

        return ResponseMediator::getList($rs, PresetEntity::class);
    }
}