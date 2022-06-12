<?php
	require('inc/head.php');
	if(!isset($_SESSION['username'])){
		header("location: login.php?error=".urlencode("Please Login First."));
		exit();
	}
	else{
	require('inc/header.php');
	require('inc/config.php');
?>
	<div class="clearfix" style="height: 51px; margin-bottom: 10px; background: red;" ></div>
	<div class="container">
        <div class="col-md-12 col-lg-12 col-sm-12 topbar">
          <h1 class="text-center" style="font-size: 45px;">Suspect Tracking Through Person Re-Identification</h1><br>
        </div>
        <div class="clearfix somemargin"></div>
        <div class="clearfix somemargin"></div>
        <div class="clearfix somemargin"></div>
        <h2 class="text-center">Welcome to Re-ID Portal</h2>
        <div class="col-lg-12 col-md-12 col-sm-12">
			<hr>
			<h2>Abstract</h2>
			<hr>
			<p class="text-center" style="text-align: justify;">This thesis gives a complete framework for re identifying a person in a camera network in order to automate the surveillance system. Attention neural models are used in the current state-of-the-art solutions. We propose combination of different loss functions on top of a temporal attention-based neural network model and apply bag of trick over it to outperform current state of art person re-identification results on PRID2011 dataset. Our combined loss function is combination of Center Loss (CL) and Online Soft Mining Loss (OSM) summation with Attention Loss (AL). As the need for surveillance and camera networks has expanded in past few years, the use of video to re-identify people has become a critical task and has attracted a lot of interest. A typical video-based person Re-Id system consists of an image-level feature extractor (such as CNN), a temporal modelling method for aggregating temporal information, and a loss function. Although several temporal modelling methods were described, direct comparisons are challenging since the used feature extractor and the used loss function have significant effect on the final result. For suspect tracking through person Re-Id, we implement a complete temporal modelling plus bag of tricks strategy. We apply this strategy on PRID2011 as well as custom dataset.</p>
			<hr>
        </div>
        <div class="clearfix somemargin"></div>
		<div class="col-lg-4 col-md-4 col-sm-12"></div>
		<div class="col-lg-4 col-md-4 col-sm-12">
			<hr>
			<h3 class="text-center">Relevent Links</h3>
			<hr>
            <a href="becnhmark.php" class="btn btn-lg btn-success btn-block" name="benchmank-btn" type="submit">Benchmark Dataset</a>
            <a href="custom.php" class="btn btn-lg btn-success btn-block" name="custom-btn" type="submit">Customized Dataset</a>
            <a href="comparison.php" class="btn btn-lg btn-success btn-block" name="comparison-btn" type="submit">Comparison</a>
            <a href="https://www.tugraz.at/institute/icg/research/team-bischof/lrs/downloads/prid11/" class="btn btn-lg btn-success btn-block" name="prid-btn" type="submit">PRID2011 Dataset Download</a>
            <a href="utils/FYP_REID_Paper.pdf" class="btn btn-lg btn-success btn-block" name="paper-btn" type="submit">Paper PDF</a>
            <hr>
		</div>
		<div class="clearfix somemargin"></div>
        <div class="clearfix somemargin"></div>
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12">
				<hr>
				<h3 class="text-center">Authors</h3>
				<hr>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<hr>
				<h3 class="text-center">Supervisor</h3>
				<hr>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<h4 class="text-center">Muhammad Wasif Ijaz</h4>
				<p class="text-center">Student<br>Department of Computer Engineering</p>
				<a href="mailto:01-132182-025@stundent.bahria.edu.pk" class="text-center" style="display: block;">01-132182-025@stundent.bahria.edu.pk</a><br>
				<hr>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<h4 class="text-center">Amara Humayun</h4>
				<p class="text-center">Student<br>Department of Computer Engineering</p>
				<a href="mailto:01-132182-033@stundent.bahria.edu.pk" class="text-center" style="display: block;">01-132182-033@stundent.bahria.edu.pk</a><br>
				<hr>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<h4 class="text-center">Enigneer Ammar Ajmal</h4>
				<p class="text-center">Assistant Professor<br>Department of Computer Engineering</p>
				<a href="mailto:aajmal.buic@bahria.edu.pk" class="text-center" style="display: block;">aajmal.buic@bahria.edu.pk</a><br>
				<hr>
			</div>
		</div>
	</div>
	<div class="clearfix" style="height: 100px; margin-bottom: 10px; background: #ccc;" ></div>
<?php
	require('inc/footer.php');
	require('inc/foot.php');
	}
?>