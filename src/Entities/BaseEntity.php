<?php

namespace P0n0marev\Ispmanager6\Entities;

class BaseEntity
{
    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->init($data);
        }
    }

    public function toArray(bool $convertBooleans = true): array
    {
        $data = (array)$this;

        if ($convertBooleans) {
            $booleans = $this->getBooleans();
            foreach ($data as $name => $value) {
                if (in_array($name, $booleans)) {
                    $data[$name] = $value ? 'on' : null;
                }
            }
        }
        return $data;
    }

    protected function getBooleans(): array
    {
        return [];
    }

    private function init(array $data): void
    {
        $booleans = $this->getBooleans();

        foreach ($data as $propertyName => $propertyValue) {
            if (property_exists($this, $propertyName)) {
                if (isset($booleans[$propertyName])) {
                    $this->$propertyName = $propertyValue == 'on';
                } else {
                    $this->$propertyName = $propertyValue;
                }
            }
        }
    }
}