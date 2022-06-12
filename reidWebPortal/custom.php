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
        <h2 class="text-center">Custom Dataset Results</h2><hr>
		<div class="clearfix"></div>
		<div class="col-two">
			<div>
				<h4 style="text-align: center;">Cam A</h4>
				<video width="320" height="240" controls autoplay muted style="display: block;margin:auto;">
				  <source src="images/cust_dataset_videos/cam_a.mp4" type="video/mp4">
				  <p>Your browser does not support the video tag.</p>
				</video>
			</div>
			<div>
				<h4 style="text-align: center;">Cam B</h4>
				<video width="320" height="240" controls autoplay muted style="display: block;margin:auto;">
				  <source src="images/cust_dataset_videos/cam_b.mp4" type="video/mp4">
				  <p>Your browser does not support the video tag.</p>
				</video>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<h3 class="text-center">Input</h3><hr><br>
			<div class="row boxSmall">
				<?php
					$query = "SELECT * from cdataset";
					$run = mysqli_query($con, $query);
					if(mysqli_num_rows($run) > 0){
					while($row = mysqli_fetch_assoc($run)){
						$cdsid = mysqli_real_escape_string($con, $row['cds_id']);
						$cdsimage = mysqli_real_escape_string($con, $row['cds_name']);
				?>
					<div class="col-sm-4 col-xs-4 col-md-2">
				      <button class="img-btn" name="<?php echo $cdsimage; ?>" onclick="btnEventListener(this);"><img src="images/InputCustom/<?php echo $cdsimage; ?>"></button>
				  	</div>
				<?php
						}
					}
					else{
						echo "<div class='alert alert-danger'>No Record Found So Far !</div>";
					}
				?>
			</div>
			<h3 class="text-center">Output Video</h3><hr><br>
			<div class="col-two">
				<div>
					<h4 style="text-align: center;">Cam A</h4>
					<video width="320" height="240" controls autoplay muted style="display: block;margin:auto; width: 100%;" id="outputvideocamA">
					  
					</video>
				</div>
				<div>
					<h4 style="text-align: center;">Cam B</h4>
					<video width="320" height="240" controls autoplay muted style="display: block;margin:auto; width:100%" id="outputvideocamB">
					  
					</video>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<h3 class="text-center">Output</h3><hr><br>
			<div class="row outputbox" id="predictedDataC">
				
			</div>
			<div class="row outputbox1" id="outputDataC">		
				<div id="outputDataCimg">

				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function btnEventListener(btnObj){
			clearContent();
			var btnName = btnObj.name;
			console.log(btnName);
			var dir = "./images/OutputCDBData/" + removeExtension(btnName);
			console.log(dir);	

			var result = checkFileExist(dir);

			if (result == true) {
			    console.log('yay, file exists!');
			    predictionModelResponse(btnName, dir);
			} else {
			    console.log('file does not exist!');
			}			
		}
		function clearContent(){
		    document.getElementById('outputDataCimg').innerHTML = '';
		    document.getElementById('predictedDataC').innerHTML = '';
		}
		function removeExtension(filename) {
		 	return filename.substring(0, filename.lastIndexOf('.')) || filename;
		}
		function checkFileExist(urlToFile) {
		    var xhr = new XMLHttpRequest();
		    xhr.open('HEAD', urlToFile, false);
		    xhr.send();
		     
		    if (xhr.status == "404") {
		        return false;
		    } else {
		        return true;
		    }
		}
		//let ts = "";
		var tstp = [];
		function predictionModelResponse(btnName, dir){
			btnName = btnName.split('.').slice(0, -1).join('.');
			console.log(btnName);
			var url = "./evaluation/customPrediction.json";  

		    $.getJSON(url, function (data) {
		        $.each(data, function (key, model){
		        	var len = model.length - 1;
		        	for (var i = 0; i <= len; i++) {
		        		if(model[i].label == btnName){
		        			$("#predictedDataC").append("<div><h2>Result</h2><p style = 'margin-left:6px;'>Person Label Predicted: " + model[i].label + "</p><br><h5>Accuracy Table</h5><table style = 'width:90%; margin:auto;'><tr><th>mAP</th><th>CMC Rank-1</th><th>CMC Rank-5</th><th>CMC Rank-10</th><th>CMC Rank-20</th></tr><tr><td>" + model[i].mAP + "</td><td>" + model[i].R1 + "</td><td>" + model[i].R2 + "</td><td>" + model[i].R3 + "</td><td>" + model[i].R4 + "</td></tr></table><br><p style = 'margin-left:6px;'>Frames are displayed below.</p></div>");
				            showImages(dir);
				            break;
				        }
				        else{
				        	console.log("No JSON");
				        }
		        	}
		        })
		    });

		    var url = "./evaluation/tracking_timestamp.json";  

			$.getJSON(url, function (data) {
		        $.each(data, function (key, model){
		        	var len = model.length - 1;
		        	console.log(key);
		        	if(key == btnName){
		        		for (var i = 0; i <= len; i++) {
		        			if(Object.values(model[i])){
		        				$("#timestamp").append("<p>Time Stamp<br>"+ Object.values(model[i]) +"</p>");
		        				tstp.push(String(Object.values(model[i])));
		        			}
			        	}
		        	}
		        })
		    });
		    showOutputVideo(btnName);
		}
		function showImages(dir){
			var fileextension = ".jpg";
			var i = 0;
			$.ajax({
			    url: dir,
			    success: function (data) {
			        $(data).find("a:contains(" + fileextension + ")").each(function () {
			            var filename = this.href.replace(window.location.host, "").replace("http:///reidWebPortal", "");
			            $("#outputDataCimg").append("<div class='col-sm-4 col-xs-4 col-md-2'><div class='img-btn'><img src='" + dir + filename + "'></div><div id='timestamp' style='font-size: 7px;font-weight: bolder;text-align:center;'>" + tstp[i]  +"</div></div>");
			            i++;
			        });
			    }
			});
			tstp = [];
		}
		function showOutputVideo(btnName){
			/*var dir = "./images/video";
			var fileextension = ".avi";
			$.ajax({
			    url: dir,
			    success: function (data) {
			    	console.log(url);
			    	$(data).find("a:contains(" + fileextension + ")").each(function () {
			            var filename = this.href.replace(window.location.host, "").replace("http:///reidWebPortal", "");
			            console.log(filename);
			            
			        });
			    }
			});*/
			if (btnName == "person_0001") {
				$("#outputvideocamA").append("<source src='video/cam_a_person_0001_tracking.mp4' type='video/mp4'><p>Your browser does not support the video tag.</p>");
				$("#outputvideocamB").append("<source src='video/cam_b_person_0001_tracking.mp4' type='video/mp4'><p>Your browser does not support the video tag.</p>");
			}
			if (btnName == "person_0002") {
				$("#outputvideocamA").append("<source src='video/cam_a_person_0002_tracking.mp4' type='video/mp4'><p>Your browser does not support the video tag.</p>");
				$("#outputvideocamB").append("<source src='video/cam_b_person_0002_tracking.mp4' type='video/mp4'><p>Your browser does not support the video tag.</p>");
			}
			if (btnName == "person_0003") {
				$("#outputvideocamA").append("<source src='video/cam_a_person_0003_tracking.mp4' type='video/mp4'><p>Your browser does not support the video tag.</p>");
				$("#outputvideocamB").append("<source src='video/cam_b_person_0003_tracking.mp4' type='video/mp4'><p>Your browser does not support the video tag.</p>");
			}
			if (btnName == "person_0004") {
				$("#outputvideocamA").append("<source src='video/cam_a_person_0004_tracking.mp4' type='video/mp4'><p>Your browser does not support the video tag.</p>");
				$("#outputvideocamB").append("<source src='video/cam_b_person_0004_tracking.mp4' type='video/mp4'><p>Your browser does not support the video tag.</p>");
			}
		}
	</script>
<?php
	require('inc/footer.php');
	require('inc/foot.php');
	}
?>