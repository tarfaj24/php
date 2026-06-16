<?php 

namespace app\models;

class Device
{
    private ?int $id;
    private int $inventory_number;
    private string $type;
    private string $brand;
    private string $model;
    private int $status_id;

    public function __construct(int $id, int $inventory_number,string $type,  string $brand, string $model, int $status_id)
    {
        $this->id = $id;
        $this->inventory_number = $inventory_number;
        $this->type = $type;
        $this->brand = $brand;
        $this->model = $model;
        $this->status_id = $status_id;
    }

    //setters
    public function setId(int $id):void
    {
        $this->id = $id;
    }

    public function setInventoryNumber(string $inventory_number):void
    {
        $this->inventory_number = $inventory_number;
    }

    public function setType(string $type):void
    {
        $this->type = $type;
    }

    public function setBrand(string $brand):void
    {
        $this->brand = $brand;
    }

    public function setModel(string $model):void
    {
        $this->model = $model;
    }

    public function setStatusId(string $status):void
    {
        $this->status_id = $status;
    }

    //getters
    public function getId():int
    {
        return $this->id;
    }

    public function getInventoryNumber():int
    {
        return $this->inventory_number;
    }


    public function getType():string
    {
        return $this->type;
    }

    public function getBrand():string
    {
        return $this->brand;
    }

    public function getModel():string
    {
        return $this->model;
    }
    
    public function getStatusId():int
    {
        return $this->status_id;
    }
}   


?>