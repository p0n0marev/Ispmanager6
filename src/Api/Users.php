<?php

namespace P0n0marev\Ispmanager6\Api;

use P0n0marev\Ispmanager6\Message\ResponseMediator;
use P0n0marev\Ispmanager6\Entities\UserEntity;

final class Users extends AbstractApi
{
    /**
     * @return UserEntity[]
     */
    public function list(): array
    {
        $rs = $this->request('user');

        return ResponseMediator::getList($rs['elem'], UserEntity::class);
    }

    public function create(UserEntity $userModel): string
    {
        $rs = $this->request('user.edit', array_merge(['sok' => 'ok'], $userModel->toArray()));

        return $rs['id'];
    }

    public function get(string $name): UserEntity
    {
        $rs = $this->request('user.edit', ['elid' => $name]);

        return ResponseMediator::getElement($rs, UserEntity::class);
    }

    public function delete(string $name): bool
    {
        $rs = $this->request('user.delete', ['elid' => $name]);

        return ResponseMediator::isSuccess($rs);
    }
}