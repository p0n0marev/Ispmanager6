<?php

namespace P0n0marev\Ispmanager6\Adapters;

final class XmlAdapter implements Ispmanager6AdapterInterface
{
    public function getData(string $data): array
    {
        $xml = new \SimpleXMLElement($data);
        $json = json_encode($xml);
        $array = json_decode($json, true);

        foreach (['passwd', 'confirm'] as $name) {
            $array[$name] = null;
        }

        return $array;
    }
}