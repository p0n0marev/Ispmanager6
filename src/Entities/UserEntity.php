<?php

namespace P0n0marev\Ispmanager6\Entities;

class UserEntity extends BaseEntity
{
    public string $name;
    public string $fullname;
    public ?string $preset = null;
    public ?string $passwd = null;
    public ?string $confirm = null;
    public ?string $comment = null;
}
