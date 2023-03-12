<?php
 $sql = "SELECT * FROM users WHERE username='$user'";
 $result = mysqli_query($conn, $sql);
     if ($result->num_rows > 0) {
         $row = mysqli_fetch_assoc($result);
         $userID = $row["id"];
     }

date_default_timezone_set("Asia/Jakarta");


function tambah($data, $userID)
{
    global $conn;
    $post = htmlspecialchars($data["post"]);
    $date = date("Y-m-d H:i:sa");

    //query insert data

    $query = "INSERT INTO post VALUES ('', '$userID', '$post', '$date')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{

    global $conn;
    $id = $data["id"];
    $matkul = htmlspecialchars($data["matkul"]);
    $dosen = htmlspecialchars($data["dosen"]);
    $hari = htmlspecialchars($data["hari"]);
    $jumlah_jam = htmlspecialchars($data["jumlah_jam"]);
    $jam_awal = htmlspecialchars($data["jam_awal"]);
    $jam_akhir = htmlspecialchars($data["jam_akhir"]);
    $tahun = htmlspecialchars($data["tahunAjaran"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $ruangan = htmlspecialchars($data["ruangan"]);
    $semester = htmlspecialchars($data["semester"]);



    // query insert data 
    $query = "UPDATE jadwal SET 
                matkul = '$matkul',
                slot_waktu = '$jam_awal - $jam_akhir',           
                dosen = '$dosen',
                jumlah_jam = '$jumlah_jam',
                hari = '$hari',
                ruang = '$ruangan',
                tahun_ajaran = '$tahun',           
                kelas = '$kelas',
                semester = '$semester'
                WHERE id = '$id'
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}