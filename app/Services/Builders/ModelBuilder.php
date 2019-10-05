<?php

namespace App\Services\Builders;

class ModelBuilder
{
    private $data;
    private $excludedData;

    public function __construct(){
        $this->data = $this->getData();
        $this->excludedData = $this->getExcludedData();
    }

    public final function getModelData() : array {
        return array_merge($this->getTransformedData(), $this->getAdditionalData());
    }

    protected final function getTransformedData(): array {
        return array_merge($this->data, $this->transformData($this->data));
    }

    /* To be overwritten by children */

    protected function transformData(array $data): array{
        return $this->data;
    }

    protected function getAdditionalData() : array {
        return [];
    }

    protected function getData(){
        return request()->except($this->excludedData);
    }

    protected function getExcludedData(){
        return request($this->excludedData);
    }

}