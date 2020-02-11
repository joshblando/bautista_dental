<?php
  include './nav.php';
?>
	<?php 
	    require_once "../../config/control.php";

        $getHistory = $connect->prepare("SELECT description from cms_content WHERE section='ABOUT' AND title = 'HISTORY'");
        $getHistory->execute();
        $history = $getHistory->fetchAll();

        $getMission = $connect->prepare("SELECT description from cms_content WHERE section='ABOUT' AND title = 'MISSION'");
        $getMission->execute();
        $mission = $getMission->fetchAll();

        $getVision = $connect->prepare("SELECT description from cms_content WHERE section='ABOUT' AND title = 'VISION'");
        $getVision->execute();
        $vision = $getVision->fetchAll();
	 ?>
	<form method="post" action="../ajax/about.php">
	 	<div class="row">
	 		<div class="col-lg-12">
	 			<div class="form-group">
	 				<label>History</label>
	 				<textarea class="form-control" cols="12" rows="12" name="about_us_history"><?php echo base64_decode($history[0]['description'])?></textarea>
	 			</div>
	 		</div>

	 		<div class="col-lg-12">
	 			<div class="form-group">
	 				<label>Mission</label>
	 				<textarea class="form-control" cols="12" rows="12" name="about_us_mission"><?php echo base64_decode($mission[0]['description'])?></textarea>
	 			</div>
	 		</div>

	 		<div class="col-lg-12">
	 			<div class="form-group">
	 				<label>Vision</label>
	 				<textarea class="form-control" cols="12" rows="12" name="about_us_vision"><?php echo base64_decode($vision[0]['description'])?></textarea>
	 			</div>
	 		</div>
	 	</div>
	 	<input class="btn btn-primary float-right" type="submit" name="updt_about" value="Save Changes">
	</form>

<?php
  include './footer.php';
?>
