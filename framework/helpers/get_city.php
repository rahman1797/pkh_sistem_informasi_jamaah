<?php

include ('../Library/koneksi.php');

if (isset($_GET['provinsi']))
{
    $get_provinsi = mysqli_real_escape_string($koneksi, $_GET['provinsi']);

    $query_get_city = mysqli_query($koneksi, "SELECT * FROM regencies WHERE province_id = {$get_provinsi}");

    $count_get_city = mysqli_num_rows($query_get_city);

    $result_city = array();

    if ($count_get_city > 0)
    {
        while ($row = mysqli_fetch_array($query_get_city))
        {
            $result_city[$row['id_regencies']] = $row['name_reg'];
        }
    }
    else
    {
        $result_city['error'] = '404';
        $result_city['message'] = 'Data not found';
    }

    echo json_encode($result_city);

    die();

}
