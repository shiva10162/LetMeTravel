<?php
require 'db_conn.php';

define("STATIONS_TABLE",    "stations");
define("CONNECTIONS_TABLE", "connections");

class Station
{
    public $db_conn;

    public function Station()
    {
        $this->db_conn = new Connection;
        $this->db_conn->connect();
    }
    public function getAllStations()
    {
        $sql        = 'SELECT * FROM '.STATIONS_TABLE;
        $result     = mysql_query($sql, $this->db_conn->getConnection());
        $output     = array();

        if (!$result)
        {
            echo "Database error during query!\n";
            echo 'MySQL error: ' . mysql_error();
            exit;
        }

        while ($row = mysql_fetch_assoc($result))
        {
            $output[$row['id']] = $row['name'];
        }

        mysql_free_result($result);

        return $output;
    }
    public function getAvailableDestination($from)
    {

    }
    public function calculateStationsDistance($from, $to)
    {

    }
    public function getStationsPrintable($array_stations)
    {
        $output = '';
        foreach ($array_stations as $key=>$value)
        {
            $output .= '<option value="'.$key.'">'.$value.'</option>';
        }

        return $output;
    }
};

?>
