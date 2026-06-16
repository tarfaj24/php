<?php 

namespace app\repositories;

use PDO;
use PDOException;
use app\models\Device;

class DeviceManager
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllDevices():?array
    {
        try
        {
            $sql = "SELECT * FROM devices";
            $stmt = $this->db->query($sql);
            $all_devices = [];
            foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $device)
            {
                $device = new Device(
                    $device["id"], 
                    $device["inventory_number"], 
                    $device["type"],
                    $device["brand"], 
                    $device["model"],
                    $device["status_id"]
                    );
                $all_devices[$device->getId()] = $device;
            }
            return $all_devices;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return NULL;
        }
    }

    public function filterDevices():?array
    {
        try
        {
            $value = $_POST["status_id"];
            if (($value) === "all")
            {
                $sql = "SELECT * FROM devices";
                $stmt = $this->db->query($sql);
            }
            else
            {
                $sql = "SELECT * FROM devices WHERE status_id = :val";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    ":val" => $value
                ]);
            }
            
            $all_devices = [];
            foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $device)
            {
                $device = new Device(
                    $device["id"], 
                    $device["inventory_number"], 
                    $device["type"],
                    $device["brand"], 
                    $device["model"],
                    $device["status_id"]
                    );
                $all_devices[$device->getId()] = $device;
            }
            return $all_devices;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return NULL;
        }
    }

}

?>