<?php

namespace P0n0marev\Ispmanager6\Message;

use P0n0marev\Ispmanager6\Entities\BaseEntity;

final class ResponseMediator
{
    public static function getElement(array $data, string $entityName): BaseEntity
    {
        return new $entityName($data);
    }

    public static function getList(array $data, string $entityName): array
    {
        $result = [];

        foreach ($data as $element) {
            $result[] = self::getElement($element, $entityName);
        }

        return $result;
    }

    public static function isSuccess(array $data): bool
    {
        return isset($data['ok']);
    }

    public static function getError(array $data): string
    {
        return $data['error']['msg'];
    }
}
