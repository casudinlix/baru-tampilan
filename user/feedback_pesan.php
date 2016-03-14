<?php 
include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/menu_user.php';

$id = $_GET['id_order'];
$queryOrd = $conn->query("SELECT * FROM order_detail WHERE id_order='$id' ");
$dataOrd =$queryOrd->fetch_array();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 	<div id="page-wrapper" >
<form class="form-horizontal" method="POST" action="aksi/aksi_feedback.php">
<fieldset>

<!-- Form Name -->
<legend>Feedback</legend>

<!-- Text input-->
<td>
<div class="form-group">
 <label class="col-md-4 control-label" for="id">Nomor Order</label>  
 
  <div class="col-md-4">
  <input id="id" name="id" type="text" placeholder="" class="form-control input-md" value="<?php echo $dataOrd['id_order']; ?>" readonly>
    
  </div>

</div>
</td>
<!-- Text input-->
<!-- Textarea -->
<td>
<div class="form-group">
  <label class="col-md-4 control-label" for="feedback">Feedback</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="feedback" name="feedback" placeholder="Pesan Untuk Kami"></textarea>
  </div>
</div>
</td>

<!-- Button -->
<div class="form-group">
  <td><label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</td>
</fieldset>
</form>

</table>
</div>
 </body>
 </html>