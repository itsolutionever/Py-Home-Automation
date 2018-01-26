<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{

$email=$_SESSION['email'];

include'pages/connection.php';
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn)
{

	$result_web = mysqli_query($conn,"SELECT * FROM commands WHERE owner ='$email'");

	
	$commands=array();
	
	while($row = mysqli_fetch_array($result_web))
	{

		$commands[$row["number_of_device"]] = array($row["oncommand"],$row["offcommand"]);
	}
	
	$no = $row['number_of_device'];
	$command = $row['command'];
	
}
mysqli_close($conn);

?>

<center>
<h2>Set Commands</h2><hr/>
<form action="index.php?page=update_commands" method="post" id="newuser">
	
<table class="table-hover table-striped text-center">
  <thead>
    <tr>
      <th style="text-align:center;">Device No.</th>
      <th style="text-align:center;">Command for On</th>
      <th style="text-align:center;">Set New for On</th>
      <th style="text-align:center;">Command for Off</th>
      <th style="text-align:center;">Set New for Off</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" style="text-align:center;">1</th>
      <td><input type="text" name="q" id="transcript11" placeholder="<?php echo$commands[1][0]?>" /></td>
      <td><img onclick="startDictation(1,1)" value="startDictation(1,1)" src="//i.imgur.com/cHidSVu.gif" /></td>
      <td><input type="text" name="q" id="transcript12" placeholder="<?php echo$commands[1][1]?>" /></td>
      <td><img onclick="startDictation(1,2)" value="startDictation(1,2)" src="//i.imgur.com/cHidSVu.gif" /></td>
    </tr>
    <tr>
      <th scope="row" style="text-align:center;">2</th>
      <td><input type="text" name="q" id="transcript21" placeholder="<?php echo$commands[2][0]?>" /></td>
      <td><img onclick="startDictation(2,1)" value="startDictation(2,1)" src="//i.imgur.com/cHidSVu.gif" /></td>
      <td><input type="text" name="q" id="transcript22" placeholder="<?php echo$commands[2][1]?>" /></td>
      <td><img onclick="startDictation(2,2)" value="startDictation(2,2)" src="//i.imgur.com/cHidSVu.gif" /></td>
    </tr>
    <tr>
      <th scope="row" style="text-align:center;">3</th>
      <td><input type="text" name="q" id="transcript31" placeholder="<?php echo$commands[3][0]?>" /></td>
      <td><img onclick="startDictation(3,1)" value="startDictation(3,1)" src="//i.imgur.com/cHidSVu.gif" /></td>
      <td><input type="text" name="q" id="transcript32" placeholder="<?php echo$commands[3][1]?>" /></td>
      <td><img onclick="startDictation(3,2)" value="startDictation(3,2)" src="//i.imgur.com/cHidSVu.gif" /></td>
    </tr>
    <tr>
      <th scope="row" style="text-align:center;">4</th>
      <td><input type="text" name="q" id="transcript41" placeholder="<?php echo$commands[4][0]?>" /></td>
      <td><img onclick="startDictation(4,1)" value="startDictation(4,1)" src="//i.imgur.com/cHidSVu.gif" /></td>
      <td><input type="text" name="q" id="transcript42" placeholder="<?php echo$commands[4][1]?>" /></td>
      <td><img onclick="startDictation(4,2)" value="startDictation(4,2)" src="//i.imgur.com/cHidSVu.gif" /></td>
    </tr>
    <tr>
      <th scope="row" style="text-align:center;">5</th>
      <td><input type="text" name="q" id="transcript51" placeholder="<?php echo$commands[5][0]?>" /></td>
      <td><img onclick="startDictation(5,1)" value="startDictation(5,1)" src="//i.imgur.com/cHidSVu.gif" /></td>
      <td><input type="text" name="q" id="transcript52" placeholder="<?php echo$commands[5][1]?>" /></td>
      <td><img onclick="startDictation(5,2)" value="startDictation(5,2)" src="//i.imgur.com/cHidSVu.gif" /></td>
    </tr>
    <tr>
      <th scope="row" style="text-align:center;">6</th>
      <td><input type="text" name="q" id="transcript61" placeholder="<?php echo$commands[6][0]?>" /></td>
      <td><img onclick="startDictation(6,1)" value="startDictation(6,1)" src="//i.imgur.com/cHidSVu.gif" /></td>
      <td><input type="text" name="q" id="transcript62" placeholder="<?php echo$commands[6][1]?>" /></td>
      <td><img onclick="startDictation(6,2)" value="startDictation(6,2)" src="//i.imgur.com/cHidSVu.gif" /></td>
    </tr>
    <tr>
      <th scope="row" style="text-align:center;">7</th>
      <td><input type="text" name="q" id="transcript71" placeholder="<?php echo$commands[7][0]?>" /></td>
      <td><img onclick="startDictation(7,1)" value="startDictation(7,1)" src="//i.imgur.com/cHidSVu.gif" /></td>
      <td><input type="text" name="q" id="transcript72" placeholder="<?php echo$commands[7][1]?>" /></td>
      <td><img onclick="startDictation(7,2)" value="startDictation(7,2)" src="//i.imgur.com/cHidSVu.gif" /></td>
    </tr>
    <tr>
      <th scope="row" style="text-align:center;">8</th>
      <td><input type="text" name="q" id="transcript81" placeholder="<?php echo$commands[8][0]?>" /></td>
      <td><img onclick="startDictation(8,1)" value="startDictation(8,1)" src="//i.imgur.com/cHidSVu.gif" /></td>
      <td><input type="text" name="q" id="transcript82" placeholder="<?php echo$commands[8][1]?>" /></td>
      <td><img onclick="startDictation(8,2)" value="startDictation(8,2)" src="//i.imgur.com/cHidSVu.gif" /></td>
    </tr>
  </tbody>
</table>
</form>
</center>
<script>
  function startDictation(id1,id2) {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
	document.getElementById('transcript'+id1+id2).value = e.results[0][0].transcript;
        //document.getElementById('transcript'+id).value
                                 //= e.results[0][0].transcript;
        recognition.stop();
        //document.getElementById('labnol').submit();

      };

      recognition.onerror = function(e) {
        recognition.stop();
	alert("Sorry, try again");
      }

    }
  }
</script>

<?php
}		
else
{
	header("location:index.php?page=login#loginuser");
}
?>
