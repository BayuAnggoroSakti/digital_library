<?php 
include "template/header.php";

?>
<?php
session_start();
if (empty($_SESSION['member_id'])) {
?>
    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
		 <div class="col-md-3">
		 </div>
		  <div class="col-md-6">
          <H3 align="center">Masukkan Member ID dan Password anda</h3>
          <br>
		<form class="form-horizontal" action="proses_login.php" method="POST">
  
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Member ID</label>
            <div class="col-sm-8">
              <input type="text" name="member_id" class="form-control" id="username" placeholder="Member ID">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" value="login" class="btn btn-default">Masuk</button>
            </div>
          </div>
        </form>
            <!-- /.col-md-8 -->
           </div>
            <div class="col-md-3">
			</div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                   <div id="pencarian"></div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Content Row -->
      
        <!-- /.row -->

        <!-- Footer -->
<?php 
include "template/footer.php";
}
else {
    header("location:member/index.php"); 
}
?>

