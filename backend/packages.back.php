<?php
    class Packages {
        private $packageID;
        private $hotelUid;
        private $packageName;
        private $packagePrice;
        private $packageDesc;
        private $packageImage;

        // constructor with empty parameters
        public function __construct() {
            $this->packageID = "";
            $this->hotelUid = "";
            $this->packageName = "";
            $this->packagePrice = "";
            $this->packageDesc = "";
            $this->packageImage = "";
        }

        // setter for every attributes
        public function setPackageDetails ($packageID, $hotelUid, $packageName, $packagePrice, $packageDesc, $packageImage) {
            $this->packageID = $packageID;
            $this->hotelUid = $hotelUid;
            $this->packageName = $packageName;
            $this->packagePrice = $packagePrice;
            $this->packageDesc = $packageDesc;
            $this->packageImage = $packageImage;
        }

        // create new package in database
        public function registerPackage () {
            $sql = "INSERT INTO packages (packageID, hotelUid, packageName, packagePrice, packageDesc, packageImage) VALUES (:value1, :value2, :value3, :value4, :value5, :value6)";

            $db = new Database();
            $stmt = $db->getConnection()->prepare($sql);

            $stmt->bindParam(':value1', $value1);
            $stmt->bindParam(':value2', $value2);
            $stmt->bindParam(':value3', $value3);
            $stmt->bindParam(':value4', $value4);
            $stmt->bindParam(':value5', $value5);
            $stmt->bindParam(':value6', $value6);

            $value1 = $this->packageID;
            $value2 = $this->hotelUid;
            $value3 = $this->packageName;
            $value4 = $this->packagePrice;
            $value5 = $this->packageDesc;
            $value6 = $this->packageImage;

            if ($stmt->execute(array(':value1' => $value1, ':value2' => $value2, ':value3' => $value3, ':value4' => $value4, ':value5' => $value5, ':value6' => $value6))) {
                echo "<script>alert('Package successfully created'); window.location.href='../frontend/packagesH.front.php'</script>";
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        // get packageId from the same hotelUid, put it into an array and return it
        public function getPackageID ($hotelUid) {
            $sql = "SELECT packageID FROM packages where hotelUid = '$hotelUid';";
            $db = new Database();
            $stmt = $db->getConnection()->prepare($sql);

            if ($stmt->execute()) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        // display package name based on package id
        public function showName ($packageID) {
            $sql = "SELECT * FROM packages where packageID = '$packageID';";
            $db = new Database();
            $stmt = $db->getConnection()->prepare($sql);

            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packageName'];
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        // display package price based on package id
        public function showPrice ($packageID) {
            $sql = "SELECT * FROM packages where packageID = '$packageID';";
            $db = new Database();
            $stmt = $db->getConnection()->prepare($sql);

            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packagePrice'];
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        // display package description based on package id
        public function showDesc ($packageID) {
            $sql = "SELECT * FROM packages where packageID = '$packageID';";
            $db = new Database();
            $stmt = $db->getConnection()->prepare($sql);

            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packageDesc'];
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }

        // display package image based on package id
        public function showImage ($packageID) {
            $sql = "SELECT * FROM packages where packageID = '$packageID';";
            $db = new Database();
            $stmt = $db->getConnection()->prepare($sql);

            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['packageImage'];
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }
    }
?>