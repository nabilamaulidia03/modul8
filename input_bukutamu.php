<?php
if (isset($_POST['upload'])) {
    
    include "config.php";
    $nama = htmlentities(trim($_POST['tnama']));
    $email = htmlentities(trim($_POST['temail']));
    $komentar = nl2br(htmlentities(trim($_POST['tkomentar'])));
    $date = date("j F Y, g:i a");
    $ip1 = $_SERVER["REMOTE_ADDR"];
    $ip2 = getenv("HTTP_X_FORWARDED_FOR");
    $ip = $ip1 . '-' . $ip2;
    if(empty($nama) || empty($email) || empty($komentar)) {
        echo "data tidak boleh kosong";
        exit;
    } else {
        $query = "Insert into pengunjung (nama,email,komentar,date,ip)" . 
        "VALUES ('$nama','$email','$komentar','$date','$ip')";

        mysqli_query($conn, $query) or die('Error, query failed' . mysqli_error($conn));
        mysqli_close(($conn));
        header('Location: input_bukutamu.php');
        exit;
    }
}
?>
<html>
    <head>
        <title> Input Bukutamu</title>
    </head>
    <body>
        
    <p>
        <form action="<?php $PHP_SELF ?>" method="post" name="uploadform" id="uploadform">
         <table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" class="content">
            <tr bgcolor="#FFDFAA">
                <td colspan="3">
                    <div align="center"><strong>Input Bukutamu</strong></div>
                </td>
<tr>
    <td colspan="3" valign="top">
        <div align="center"><a href="admin.php">Cencel</a></div>
    </td>
</tr>
<tr>
<td width="26%" valign="top"><strong>Nama <span class="stylel">*</span></strong></td>
<td width="2%">:</td>
<td width="72%"><input name="tnama" type="text" id="tnama" size="30" maxlength="30">
    <span class="stylel"> </span>
</td>
</tr>
<tr>
    <td valign="top"><strong>Email <span class="stylel">*</span></strong></td>
    <td>:</td>
    <td><input name="temail" type="text" id="temail" size="30" maxlength="30">
</td>
</tr>
<tr>
    <td valign="middle"><strong>Pesan <span class="stylel">*</span></strong></td>
    <td>:</td>
    <td valign="top"><textarea name="tkomentar" cols="50" rows="5" id="tkomentar"></textarea></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="upload" type="submit" class="box" id="uploadform" value=" submit"></td>
</tr>
<tr>
    <td colspan="3"><span class="stylel">*<</span> : Harus memgisi data </td>
</tr>
</table>
</form>
</body>
    </html>