<?php

namespace app\controllers;
use app\repositories\DeviceManager;
use app\models\Device;

class DeviceController
{
    private DeviceManager $device_manager;

    public function __construct($device_manager)
    {
        $this->device_manager = $device_manager;
    }
    public function home()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $all_devices = $this->device_manager->filterDevices();
        }
        else
        {
            $all_devices = $this->device_manager->getAllDevices();
        }
        
        $status_id_array = [1=>"functional", 2=>"non-functional"];
        include __DIR__."/../../view/Home.php";
    }
    
}