<?php

namespace P0n0marev\Ispmanager6\Adapters;

use P0n0marev\Ispmanager6\Entities\BaseEntity;

interface Ispmanager6AdapterInterface
{
    public function getInstance(string $data): Ispmanager6AdapterInterface;

    public function getElement(string $entityName): BaseEntity;

    public function getList(string $entityName): array;

    public function isSuccess(): bool;

    public function getError(): string;

    public function getData();
}