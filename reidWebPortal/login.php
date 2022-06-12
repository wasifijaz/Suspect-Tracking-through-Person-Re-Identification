<?php
	require('inc/head.php');
  require('inc/header.php');
    if(isset($_SESSION['username'])){
        header("location: index.php");
        exit();
    }
    else{
?>
	<div class="container">
    <div class="clearfix" style="height: 51px; margin-bottom: 10px; background: red;" ></div>
      	<?php if(isset($_GET['error'])){ ?>
      		<div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
      	<?php } ?>
        <div class="col-md-12 col-lg-12 col-sm-12 topbar">
          <h1 class="text-center" style="font-size: 45px;">Suspect Tracking Through Person Re-Identification</h1><br>
        </div>
        <div class="clearfix somemargin"></div>
        <div class="col-lg-3 col-md-3 col-sm-12 rightside">
          <h3>Authors</h3>
          <hr>
          <h4 class="text-center">Muhammad Wasif Ijaz</h4>
          <p class="text-center">Student<br>Department of Computer Engineering</p>
          <a href="mailto:01-132182-025@stundent.bahria.edu.pk" class="text-center" style="display: block;">01-132182-025@stundent.bahria.edu.pk</a>
          <h4 class="text-center">Amara Humayun</h4>
          <p class="text-center">Student<br>Department of Computer Engineering</p>
          <a href="mailto:01-132182-033@stundent.bahria.edu.pk" class="text-center" style="display: block;">01-132182-033@stundent.bahria.edu.pk</a>
          <br>
          <h3>Supervisor</h3>
          <hr>
          <h4 class="text-center">Enigneer Ammar Ajmal</h4>
          <p class="text-center">Assistant Professor<br>Department of Computer Engineering</p>
          <a href="mailto:aajmal.buic@bahria.edu.pk" class="text-center" style="display: block;">aajmal.buic@bahria.edu.pk</a><br>
          <h4>Thesis Paper</h4>
          <hr>
          <a href="utils/FYP_REID_Paper.pdf" class="text-center btn-danger" style="display: block;">Download PDF</a>
          <br>
          <h4>Citation</h4>
          <hr>
          <p class="text-center"><b>Bibtex</b><br></p>
          <p class="text-center bibtex">@paper{ijaz_humayun_ajmal_2022, title={Suspect Tracking through Person Re-Identification}, author={Ijaz, Muhammad Wasif and Humayun, Amara and Ajmal, Engineer Ammar}, year={2022}}</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <h2>Overview</h2>
          <hr>
          <p class="text-center" style="text-align: justify;"><b>Background</b><br>Video surveillance is widely utilised and developed in all parts of life in modern civilizations, thanks to significant technological improvements in the last 15 years and the simple accessibility of cameras and digital media storage. The recent global security environment, with terrorist attacks in New York (2001), Madrid (2004), and Pakistan (2012), has undoubtedly contributed to this rise, in order to assure the protection of persons and assets against terrorism actions, but not exclusively.<br>
          The need to increase the capacity of video surveillance of cities and businesses has been demonstrated by the prevention and repression of crime and delinquency, the protection of industrial and administrative buildings, security airports, train stations, ports, road safety, people flow management, and other needs.<br><br>
          <b>Problem Statement</b><br>To track a suspect we need to look in hundred or thousand hours of recorded videos taken from large number of different cameras.It requires a large dedicated manpower and takes a lot of time.Also results in high financial cost, unavailability of competent staff and decreased concentration. So the main problem is how an automatic system can characterize a person of interest, to track him/her in a camera network and determine his/her localization in a huge volume of recorded videos?<br><br>
          <b>Proposed Solution</b><br>The challenge of retrieving a certain person in different photos or videos, maybe captured from different cameras in different surroundings, is addressed by Person re-Identification (re-ID). It has gotten more attention in recent years as a result of rising public safety demands and quickly expanding surveillance camera networks. It has a wide range of practical uses; for example, in a huge scene, it can save a lot of people and material resources. However because to various uncontrollable difficult environment aspects such as time-varying light conditions, human position changes and partial occlusion, it remain a challenge.<br>
          Re-ID aims to detect whether a person-of-interest has appeared in another location at a different time captured by a different camera, or even the same camera at a different time instant captured by the same camera. An image, a video sequence, or even a text description might be used to illustrate a person’s enquiry. The aim of the project is to use technology to allow assistance for surveillance and bring automation to security systems to efficiently and accurately identify events.</p><hr>
          <h2>Results</h2>
          <hr>
          <p class="text-center" style="text-align: justify;"></p><hr>
          <div>
            <br>
            <h5>Our Model Results Comparison: Temporal Attention Model + Bag of Tricks + Attention CL Loss</h5>
            <table style = "width:90%; margin:auto;">
              <tr>
                <th>
                  Datasets
                </th>
                <th>
                  mAP
                </th>
                <th>
                  CMC Rank-1
                </th>
                <th>
                  CMC Rank-5
                </th>
                <th>
                  CMC Rank-10
                </th>
                <th>
                  CMC Rank-20
                </th>
              </tr>
              <tr>
                <td>
                  PRID2011 Benchmark Dataset
                </td>
                <td style="font-weight: bold;">
                  92.6%
                </td>
                <td style="font-weight: bold;">
                  88.8%
                </td>
                <td style="font-weight: bold;">
                  98.9%
                </td>
                <td style="font-weight: bold;">
                  98.9%
                </td>
                <td style="font-weight: bold;">
                  100.0%
                </td>
              </tr>
              <tr>
                <td>
                  Self Generated Custom Dataset
                </td>
                <td>
                  84.7%
                </td>
                <td>
                  73.5%
                </td>
                <td>
                  81.6%
                </td>
                <td>
                  89.3%
                </td>
                <td>
                  94.6%
                </td>
              </tr>
            </table>
            <br>
            <p style = "margin-left:6px; text-align: center; font-style: italic;">Note: Mean Average Precision (mAP), Cummulative Match Curve (CMC)</p>
          </div>
          <h2>Dataset</h2>
          <hr>
          <p class="text-center" style="text-align: justify;">We focus on the PRID2011 datasets containing 934 identities, which are equally split among training and testing sets. Images from several person trajectories collected by two different, static surveillance cameras make up the dataset. The images from these cameras show a shift in viewpoint as well as significant differences in lighting, background, and camera attributes. Because images are retrieved from trajectories, each camera view has numerous possible positions per individual. The first 200 persons appear in both views A and B, while the remaining persons in each view complete the gallery set of that view. To download this dataset click on link below.<br></p>
          <a href="https://www.tugraz.at/institute/icg/research/team-bischof/lrs/downloads/prid11/" class="text-center btn-danger" style="display: block;">Download PRID2011 Dataset</a><hr>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 leftside">
          <form class="form-signin" method="post" action="login.php">
            <h2 class="form-signin-heading">Re-ID Portal</h2>
            <hr>
            <br>
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus name="username">
            <br>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
            <button class="btn btn-lg btn-danger btn-block" name="login-btn" type="submit">Sign in</button>
          </form>
          <img src="utils/bannar.jpg" style="width: 100%;margin-bottom: 1vw;">
        </div>
    </div> <!-- /container -->
    <?php
    	if(isset($_POST['login-btn'])){
    		$un = $_POST['username'];
    		$up = $_POST['password'];
    		$dun = ("PRID2011");
    		$dup = ("123456789");
    		if($un == $dun AND $up == $dup){
    			$_SESSION['username'] = $un;
    			header("location: index.php");
    			exit();
    		}
    		else{
    			SESSION_DESTROY();
    			header("location: login.php?error=".urlencode("Wrong Username or Password."));
    			exit();
    		}
    	}
    ?>
<?php
	require('inc/foot.php');
	}
?>