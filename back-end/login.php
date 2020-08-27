<?php

date_default_timezone_set('Asia/Jakarta');
//koneksi database
 mysql_connect("localhost","root","");
 mysql_select_db("db_tes");

 //data yang diperoleh dari form mahasiswa
 $username=$_POST['username'];
 $password=$_POST['password'];
 $pass = md5($password);

 $date_login = date("Y-m-d H:i:s");
 //simpan data kedalam database
 $sql=mysql_query("Select * from users where username = '$username' and password = '$pass'") or die(mysql_error());
 $sql2=mysql_query("Update users SET time_login = '$date_login', status = 'sukses' where username = '$username' and password = '$pass'") or die(mysql_error());

 $row = mysql_fetch_row($sql);

 if(mysql_num_rows($sql)==0){
    $response['status'] = 'false';
    $response['message'] = "<div style='color:red'>Gagal Login</div>";
    echo json_encode($response);
}
else{
    $response['username'] = $username;
    $response['status'] = 'success';
    $response['waktu'] = $date_login;
    $response['message'] = "<div style='color:green'>Berhasil Login</div>";
    echo json_encode($response);
}
?>