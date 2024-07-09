<?php
include ("sambungan.php");
$idguru=$_GET["idguru"];
$qry=mysqli_query($sambungan, "select * from guru where IDGuru='$idguru'");
$data=mysqli_fetch_array($qry);
$namaguru=$data['NamaGuru'];
$password=$data['Password_Guru'];


if (isset($_POST['update']))
{
  $namaguru=$_POST["namaguru"];
  $password=$_POST["password_guru"]; 
  
  $edit=mysqli_query($sambungan, "update guru set NamaGuru='$namaguru', Password_Guru='$password' where IDGuru='$idguru' ");
  
  if ($edit)
  {
      mysqli_close($sambungan);
      header ("location: query_guru.html");
      exit;
  }
    else{
        echo mysqli_error();
    } 
}
?>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<h3>KEMASKINI GURU</h3>
<form method="post">
   <table>
                <tr>
                    <td>ID Guru</td>
                    <td><input type="text"name="idguru" value=
                    <?php echo "'$idguru'"; ?>
                    >
                    </td>
                </tr>
                <tr>
                    <td>Nama Guru</td>
                    <td><input type="text"name="namaguru"  value=
                    <?php echo "'$namaguru'" ?>
                    >
                    </td>
                </tr>
                <tr>
                    <td>Password Guru</td>
                    <td><input type="text" name="password_guru" value=
                    <?php echo "'$password'" ?>
                    >
                    </td>
                </tr>
                    
        </table>
    <!--
    <input type="text" name="namaguru" value="//$data['namaguru'] ?>" placeholder="Nama Anda" Required>
    <input type="text" name="password_guru" value=" //echo $data['password_guru']?>" placeholder="Password" Required> -->
    <button class="update" type="submit" name="update" value="Update">Update</button>
    <!--<input type="submit" name="update" value="Update"> -->
</form>

<!--
$idguru=$_POST["idguru"];
$namaguru=$_POST["namaguru"];
$password=$_POST["password_guru"];

$sql="update guru set NamaGuru='$namaguru', Password_Guru='$password' where IDGuru='$idguru' ";
echo $sql; 

$result=mysqli_query($sambungan,$sql);
if ($result==true)
    echo "<script> if (confirm('Rekod Berjaya Dikemaskini')) document.location='guru_update.html';</script>";
else 
    echo "Ralat: $sql<br>".mysqli_error($sambungan); -->