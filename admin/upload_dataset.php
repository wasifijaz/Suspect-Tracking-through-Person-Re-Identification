<html>
    <head></head>
    <?php 
        require('config.php');
    ?>
    <body>
        <form method="post" action="upload_dataset.php" enctype="multipart/form-data">
            <input type="file" name="dsimage" required="required">
            <button type="submit" name="add-dataset">Upload File</button>
        </form>
        <form method="post" action="upload_dataset.php" enctype="multipart/form-data">
            <input type="file" name="cdsimage" required="required">
            <button type="submit" name="add-cdataset">Upload File</button>
        </form>
        <?php
          if(isset($_POST['add-dataset'])){
            $dsimgname = $_FILES['dsimage']['name'];
            $dstype = $_FILES['dsimage']['type'];
            $dstmpname = $_FILES['dsimage']['tmp_name'];
            if($dstype == "image/jpg" OR $dstype == "image/jpeg" OR $dstype == "image/png"){
              $query = "INSERT INTO `dataset`(`ds_id`, `ds_image`) VALUES (NULL, '$dsimgname')";
              $run = mysqli_query($con, $query);
              if($run){
                move_uploaded_file($dstmpname, "../images/InputBenchMark/$dsimgname");
                header("location: upload_dataset.php?success=".urlencode("Dataset Added Successfully."));
              }
              else{
                header("location: upload_dataset.php?error=".urlencode("There is some issue with database insert query."));
              }
            }
            else{
              header("location: upload_dataset.php?error=".urlencode("Image Type is not correct."));
            }
          }
          if(isset($_POST['add-cdataset'])){
            $dsimgname = $_FILES['cdsimage']['name'];
            $dstype = $_FILES['cdsimage']['type'];
            $dstmpname = $_FILES['cdsimage']['tmp_name'];
            if($dstype == "image/jpg" OR $dstype == "image/jpeg" OR $dstype == "image/png"){
              $query = "INSERT INTO `cdataset`(`cds_id`, `cds_name`) VALUES (NULL, '$dsimgname')";
              $run = mysqli_query($con, $query);
              if($run){
                move_uploaded_file($dstmpname, "../images/InputCustom/$dsimgname");
                header("location: upload_dataset.php?success=".urlencode("Dataset Added Successfully."));
              }
              else{
                header("location: upload_dataset.php?error=".urlencode("There is some issue with database insert query."));
              }
            }
            else{
              header("location: upload_dataset.php?error=".urlencode("Image Type is not correct."));
            }
          }
        ?>
    </body>
</html>