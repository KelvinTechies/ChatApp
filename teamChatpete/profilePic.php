<?php
require 'header.php';

?>


<!-- <center> -->
<div class="container">
<div class="nd" style="height:20px; width:1010px; border:trasparent">
  <div class="mew" style="width:0%; height:100%; background-color:blue; color:#fff; text-align:center">
50%
  </div>
</div>

<div class="cont">
  <div class="imgcont">
  <div class="p-4 border-bottom">
                        <div class="mb-4">
                            <img src="profileUploads/<?php echo loggedPic('User_Img')?>" class="rounded-circle avatar-lg img-thumbnail" alt="">
                        </div>
    <!-- <img class="im" src="profileUploads/" alt=""> -->
  </div>
</div>
<div class="form m-4 pt-5">
<?php

newUpload()?>
<form class="pic save" action="" method="post" enctype="multipart/form-data">

<div class="myMsg"></div>
<div >
<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">UserName*</span>
  <input type="text" class="form-control" name="username"  value="<?php echo profile ('user')?>" placeholder="Username..." aria-label="Username" aria-describedby="addon-wrapping">
</div>
<div class="input-group flex-nowrap mt-4">
<span class="input-group-text " id="addon-wrapping">Email*</span>
<input type="email" class="form-control" name="email" value="<?php echo profile ('email')?>" placeholder="Email..." aria-label="Email" aria-describedby="addon-wrapping">
</div>
  <label for="formFileLg" class="form-label mt-4">Choose Profile Picture</label>
  <input class="form-control form-control-lg" id="formFileLg" type="file" onchange="fileUpload(this.files)" name="file">

  <button type="submit" name="upload" value="save" class="btn btn-secondary">Save</button>
  </div>
</form>
</div>

</div>
</center>
    
<?php
require 'footer.php';
?>