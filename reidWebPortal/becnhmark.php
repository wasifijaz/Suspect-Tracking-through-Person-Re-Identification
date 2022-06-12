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
        <h2 class="text-center">Benchmark Dataset Results</h2>
		<div class="clearfix"></div>
		<hr>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<h3 class="text-center">Input</h3><hr><br>
			<div class="row box">
			<?php
				$query = "SELECT * from dataset";
				$run = mysqli_query($con, $query);
				if(mysqli_num_rows($run) > 0){
				while($row = mysqli_fetch_assoc($run)){
					$dsid = mysqli_real_escape_string($con, $row['ds_id']);
					$dsimage = mysqli_real_escape_string($con, $row['ds_image']);
			?>
				<div class="col-sm-4 col-xs-4 col-md-2">
			      <button class="img-btn" name="<?php echo $dsimage; ?>" onclick="btnEventListener(this);"><img src="images/InputBenchMark/<?php echo $dsimage; ?>"></button>
			  	</div>
			<?php
					}
				}
				else{
					echo "<div class='alert alert-danger'>No Record Found So Far !</div>";
				}
			?>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<h3 class="text-center">Output</h3><hr><br>
			<div class="row outputbox" id="predictedData">
				
			</div>
			<div class="row outputbox1" id="outputData">
				
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function btnEventListener(btnObj){
			clearContent();
			var btnName = btnObj.name;
			console.log(btnName);
			var dir = "./images/OutputDBData/" + removeExtension(btnName);
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
		    document.getElementById('outputData').innerHTML = '';
		    document.getElementById('predictedData').innerHTML = '';
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
		function showImages(dir){
			var fileextension = ".png";
			$.ajax({
			    url: dir,
			    success: function (data) {
			        $(data).find("a:contains(" + fileextension + ")").each(function () {
			            var filename = this.href.replace(window.location.host, "").replace("http:///reidWebPortal", "");
			            console.log(filename);
			            $("#outputData").append("<div class='col-sm-4 col-xs-4 col-md-2'><div class='img-btn'><img src='" + dir + filename + "'></div></div>");
			        });
			    }
			});
		}
		function predictionModelResponse(btnName, dir){
			btnName = btnName.split('.').slice(0, -1).join('.');
			console.log(btnName);
			var url = "./evaluation/prediction.json";         
		    $.getJSON(url, function (data) {
		        $.each(data, function (key, model){
		        	var len = model.length - 1;
		        	for (var i = 0; i <= len; i++) {
		        		if(model[i].label == btnName){
		        			$("#predictedData").append("<div><h2>Result</h2><p style = 'margin-left:6px;'>Person Label Predicted: " + model[i].label + "</p><br><h5>Accuracy Table</h5><table style = 'width:90%; margin:auto;'><tr><th>mAP</th><th>CMC Rank-1</th><th>CMC Rank-5</th><th>CMC Rank-10</th><th>CMC Rank-20</th></tr><tr><td>" + model[i].mAP + "</td><td>" + model[i].R1 + "</td><td>" + model[i].R2 + "</td><td>" + model[i].R3 + "</td><td>" + model[i].R4 + "</td></tr></table><br><p style = 'margin-left:6px;'>Frames are displayed below.</p></div>");
				            console.log(model[i].label);
				            console.log(model[i].mAP);
				            console.log(model[i].R1);
				            console.log(model[i].R2);
				            console.log(model[i].R3);
				            console.log(model[i].R4);
				            showImages(dir);
				            break;
				        }
				        else{
				        	console.log("No JSON");
				        }
		        	}
		        })
		    });
		}
	</script>
<?php
	}
	require('inc/footer.php');
	require('inc/foot.php');
?>