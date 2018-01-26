<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{
$email=$_SESSION['email'];
include'pages/connection.php';
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn)
{
  echo"<center>";
  echo"<h2>Locate Registered Devices</h2><hr/>";

  $result_web = mysqli_query($conn,"SELECT * FROM devices WHERE owner ='$email'");
  if(!mysqli_num_rows($result_web))
  {
    echo"<br><br>";
    echo"<h2>Sorry, No Devices Registered Yet</h2>";
  }
  else
  {
    
    echo"<table>";
    echo"<div class=\"table-responsive\">";
    echo"<table class=\"table table-bordered table-hover table-striped\">";
    echo"<thead>
              <tr>
              	  <th style=\"text-align:center\">No.</th>
                  <th style=\"text-align:center\">MAC Address</th>
                  <th style=\"text-align:center\">Status</th>
                  <th style=\"text-align:center\">View on Map</th>
              </tr>
          </thead>";
    echo"<tbody>";

    $count=1;
    while($row = mysqli_fetch_array($result_web))
    {
      echo"<tr class=\"active\">";                      
      echo"<td align=\"center\">".$count."</td>";
      //echo"<td align=\"center\">".$row['device_unique_id']."</td>";
      echo"<td align=\"center\">".$row['mac']."</td>";
      

      if($row['status'] == 0)
      {
        echo"<td align=\"center\" style=\"color:red\">&nbsp;Not Active&nbsp;</td>";
      }
      elseif($row['status'] == 1)
      {
        echo"<td  align=\"center\" style=\"color:green\">&nbsp;Active&nbsp;</td>";
      }
      else
      {
        echo"<td align=\"center\">&nbsp;Unknown&nbsp;</td>";
      }

      echo"<td align=\"center\">";
      echo"<a href=\"index.php?&page=user&subpage=view_device&latitude=".$row['latitude']."&longitude=".$row['longitude']."\"><i class=\"fa fa-map-marker fa-lg\" style=\"font-size:24px;\"/></a>";
      echo"</td>";
      echo"</tr>";
      
      $count++;
      
    }
    echo"</tbody>";
    echo "</table>";
    echo"</center>";
  }
  
}
mysqli_close($conn);
}
else
{
	header("location:index.php?page=login#loginuser");
}
?>

