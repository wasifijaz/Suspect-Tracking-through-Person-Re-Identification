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
        <h2 class="text-center">Comparison<hr></h2>
		<div class="clearfix"></div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h3 class="text-center">Results</h3><hr><br>
			<div class="row outputboxComparison">
				<div>
					<!-- Benchmark Dataset Results -->
					<br>
					<h5>Accuracy Comparison Table of Proposed Model with Other Models: PRID2011</h5>
					<table style = "width:90%; margin:auto;">
						<tr>
							<th>
								Model
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
								Temporal Pooling
							</td>
							<td>
								52.3%	
							</td>
							<td>
								50.6%
							</td>
							<td>
								85.4%
							</td>
							<td>
								94.4%
							</td>
							<td>
								97.8%
							</td>
						</tr>
						<tr>
							<td>
								Temporal Pooling + Bag of Tricks
							</td>
							<td>
								81.7%
							</td>
							<td>
								78.8%
							</td>
							<td>
								91.0%
							</td>
							<td>
								97.8%
							</td>
							<td>
								97.8%
							</td>
						</tr>
						<tr>
							<td>
								Temporal Attention
							</td>
							<td>
								76.7%
							</td>
							<td>
								62.5%
							</td>
							<td>
								95.8%
							</td>
							<td>
								96.6%
							</td>
							<td>
								98.9%
							</td>
						</tr>
						<tr>
							<td>
								Temporal Attention + Bag of Tricks
							</td>
							<td>
								81.3%
							</td>
							<td>
								83.1%
							</td>
							<td>
								97.8%
							</td>
							<td>
								98.9%
							</td>
							<td>
								100.0%
							</td>
						</tr>
						<tr>
							<td>
								Temporal Attention + Bag of Tricks + Attention CL Loss (Ours)
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
								98.8%
							</td>
							<td style="font-weight: bold;">
								100.0%
							</td>
						</tr>
					</table>
					<br>
					<p style = "margin-left:6px; text-align: center; font-style: italic;">Note: Mean Average Precision (mAP), Cummulative Match Curve (CMC)</p>
					<!-- Self Generated Custom Dataset Results -->
					<br>
					<h5>Accuracy Comparison Table of Proposed Model with Other Models: Self Generated Custom Dataset</h5>
					<table style = "width:90%; margin:auto;">
						<tr>
							<th>
								Model
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
								Temporal Pooling
							</td>
							<td>
								48.5%	
							</td>
							<td>
								46.7%
							</td>
							<td>
								68.2%
							</td>
							<td>
								75.3%
							</td>
							<td>
								79.5%
							</td>
						</tr>
						<tr>
							<td>
								Temporal Pooling + Bag of Tricks
							</td>
							<td>
								70.2%
							</td>
							<td>
								67.1%
							</td>
							<td>
								71.6%
							</td>
							<td>
								79.3%
							</td>
							<td>
								82.4%
							</td>
						</tr>
						<tr>
							<td>
								Temporal Attention
							</td>
							<td>
								67.3%
							</td>
							<td>
								60.0%
							</td>
							<td>
								75.2%
							</td>
							<td>
								82.6%
							</td>
							<td>
								85.3%
							</td>
						</tr>
						<tr>
							<td>
								Temporal Attention + Bag of Tricks
							</td>
							<td>
								73.9%
							</td>
							<td>
								69.9%
							</td>
							<td>
								78.8%
							</td>
							<td>
								83.2%
							</td>
							<td>
								89.7%
							</td>
						</tr>
						<tr>
							<td>
								Temporal Attention + Bag of Tricks + Attention CL Loss (Ours)
							</td>
							<td style="font-weight: bold;">
								84.7%
							</td>
							<td style="font-weight: bold;">
								73.5%
							</td>
							<td style="font-weight: bold;">
								81.6%
							</td>
							<td style="font-weight: bold;">
								89.3%
							</td>
							<td style="font-weight: bold;">
								94.6%
							</td>
						</tr>
					</table>
					<br>
					<p style = "margin-left:6px; text-align: center; font-style: italic;">Note: Mean Average Precision (mAP), Cummulative Match Curve (CMC)</p>
					<!-- Proposed Model Results Comparison -->
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
			</div>
		</div>
	</div>
<?php
	require('inc/footer.php');
	require('inc/foot.php');
	}
?>