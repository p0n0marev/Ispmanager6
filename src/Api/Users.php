<?php

namespace P0n0marev\Ispmanager6\Api;

use P0n0marev\Ispmanager6\Entities\HistoryEntity;
use P0n0marev\Ispmanager6\Entities\UserEntity;

final class Users extends AbstractApi
{
    /**
     * @return UserEntity[]
     */
    public function list(): array
    {
        $this->request('user');

        return $this->adapter->getList(UserEntity::class);
    }

    public function create(UserEntity $userEntity): void
    {
        $this->request('user.edit', array_merge(['sok' => 'ok'], $userEntity->toArray()));
    }

    public function update(UserEntity $userEntity): void
    {
        $this->request('user.edit', array_merge(['sok' => 'ok', 'elid' => $userEntity->name], $userEntity->toArray()));
    }

    public function get(string $name): UserEntity
    {
        $this->request('user.edit', ['elid' => $name]);

        return $this->adapter->getElement(UserEntity::class);
    }

    public function delete(string $name): void
    {
        $this->request('user.delete', ['elid' => $name]);
    }

    public function suspend(string $name): void
    {
        $this->request('user.suspend', ['elid' => $name]);
    }

    public function resume(string $name): void
    {
        $this->request('user.resume', ['elid' => $name]);
    }

    public function history(string $name): array
    {
        $this->request('user.history', ['elid' => $name]);

        return $this->adapter->getList(HistoryEntity::class);
    }
}
