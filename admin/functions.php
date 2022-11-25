<?php 

    function get_count($table){
        $connection = mysqli_connect("localhost", "root", "", "lms");
        $total_count = "";
        $query = "SELECT COUNT(*) AS total_count FROM $table";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            $total_count = $row['total_count'];
        }
        return $total_count;
    }

?>