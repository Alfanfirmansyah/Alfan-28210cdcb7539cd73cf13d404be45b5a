<?php

//koneksi database
 mysql_connect("localhost","root","");
 mysql_select_db("db_tes");

 //data yang diperoleh dari form mahasiswa
 $username=$_POST['username'];
 $password=$_POST['password'];
 $pass = md5($password);

 //simpan data kedalam database
 $sql=mysql_query("INSERT INTO users(username, password) VALUES('".$username."','".$pass."')") or die(mysql_error());
 if ($sql) {
    $response['status'] = 'success';
    echo json_encode($response);
 }else{
  echo "<div style='color:red'>Data gagal disimpan!</div>";
 }
?>