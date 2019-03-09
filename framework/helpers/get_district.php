<?php

include ('../Library/koneksi.php');

if (isset($_GET['kota']))
{
    $get_kota = mysqli_real_escape_string($koneksi, $_GET['kota']);

    $sql_get_district = "SELECT * FROM districts WHERE regency_id = {$get_kota}";

    $query_get_district = mysqli_query($koneksi, $sql_get_district);

    $count_get_district = mysqli_num_rows($query_get_district);

    $result_district = array();

    if ($count_get_district > 0)
    {
        while ($row = mysqli_fetch_array($query_get_district))
        {
            $result_district[$row['id_districts']] = $row['name_dis'];
        }
    }
    else
    {
        $result_district['error'] = '404';
        $result_district['message'] = 'Data not found';
    }

    echo json_encode($result_district);

    die();

}
