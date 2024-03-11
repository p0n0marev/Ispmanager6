<?php

namespace P0n0marev\Ispmanager6\Entities;

class PresetEntity extends BaseEntity
{
    public int $level;
    public string $name;
    public ?int $limit_quota = null;
}
