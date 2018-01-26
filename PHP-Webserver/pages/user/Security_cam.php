<h2 class="my-4 text-center text-lg-left">Detected Faces In Camera</h2>
<hr>	
<br>
<div class="row text-center text-lg-left">
    <?php

    	for($i=0;$i<5;$i++)
    	{
    		echo"<div class=\"col-lg-3 col-md-4 col-xs-6\">";
	        //echo"<a href=\"#\" class=\"d-block mb-4 h-100\">";
	        echo"<img class=\"img-fluid img-thumbnail\" src=\"img/team/2.jpg\" alt=\"http://placehold.it/300x300\" hight=\"250\" width=\"250\">";
	        //echo"</a>";
	        echo"<table>";
	        echo"<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
	        echo"<tr>";
	        echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
	        echo"<td>Date :</td>";
	        echo"<td>&nbsp;04/09/2017</td>";
	        echo"<td rowspan=2>&nbsp;&nbsp;&nbsp;<i class=\"fa fa-trash\" aria-hidden=\"true\" style=\"color:skyblue;font-size:30;\"></i></td>";
	        echo"</tr>";
	        echo"<tr>";
	        echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
	        echo"<td>Time:</td>";
	        echo"<td>&nbsp;12:10AM</td>";
	        echo"</tr>";
	        echo"<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
	        echo"</table>";
	        //echo"Date:	04/09/2017";
	        //echo"<br>";
	        //echo"Time:	12:10AM";
	        //echo"<br>";
	        //echo"<a href=\"\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\" style=\"color:red;font-size:24;\"></i></a>";

			echo"</div>";
    	}
        
     ?>
</div>
