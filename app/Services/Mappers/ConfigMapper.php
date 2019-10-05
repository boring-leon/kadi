<?php

namespace App\Services\Mappers;

class ConfigMapper
{
    protected $configKey;

    public final function getMappedItems(){       
        $data = array_map([$this, 'callback'], $this->getDataSource());
        return $this->transformMapped($data);
    }

    protected function transformMapped($data){
        return $data;
    }

    protected function callback($item){
        return $item;
    }

    protected final function getDataSource() : array {
        return config($this->configKey);
    }

    protected final function getItemIndex($item){
        return array_search($item, $this->getDataSource());
    }

    protected final function toObject(array $array){
        $obj = new \stdClass;
        foreach($array as $key => $val){
            $obj->{$key} = $val;
        }

        return $obj;
    }
}