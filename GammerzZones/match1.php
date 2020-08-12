<?php
session_start();
  $username=$_SESSION['username'];
  function countplayers($match)
  {
    $con=mysqli_connect("localhost", "sourav", "12345","GamerzZones") or
        die("Could not connect: " . mysqli_error());
    mysqli_select_db($con,"GamerzZones");
    $result=mysqli_query($con,"select * from $match")or die("Failed to query database".mysqli_error($con));
    $row=mysqli_num_rows($result);
    mysqli_close($con);
    return($row);    
  }
  function display_players_from_match($username,$match,$modal)
   {
    $val="";
   
    $con=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
    mysqli_select_db($con,"GamerzZones");
    $result=mysqli_query($con,"select * from $match where username='$username'")or die("Failed to query database".mysqli_error($con));
      $row=mysqli_fetch_array($result);
      if ($row['username']==$username) {
        switch ($match) {
           case 'match1':
            $val= "#myModalshowplayer1";
            break;
           case 'match2':
            $val= "#myModalshowplayer2";
            break;
           case 'match3':
             $val= "#myModalshowplayer3";
             break;
             case 'match4':
            $val= "#myModalshowplayer4";
            break;
           case 'match5':
            $val= "#myModalshowplayer5";
            break;
           case 'match6':
             $val= "#myModalshowplayer6";
             break;
             case 'match7':
            $val= "#myModalshowplayer7";
            break;
           case 'match8':
            $val= "#myModalshowplayer8";
            break;
           case 'match9':
             $val= "#myModalshowplayer9";
             break;
           case 'match10':
             $val= "#myModalshowplayer10";
             break;
      
        }
      }else{
        $val= $modal;
      }
      mysqli_close($con);
      echo($val);
  }
  
  function joinorjoined($username,$match)
  {
    $val="";
    $con=mysqli_connect('localhost','sourav','12345');
        mysqli_select_db($con,"GamerzZones");
      $result=mysqli_query($con,"select * from $match where username='$username'")or die("Failed to query database".mysqli_error($con));
      $row=mysqli_fetch_array($result);
      if ($username == $row['username']) {
          $val= "JOINED";
      }else
      {
        $val= "JOIN";
      }
      mysqli_close($con);
      echo $val;

  }
  $con=mysqli_connect('localhost','sourav','12345');
        mysqli_select_db($con,"GamerzZones");
    $result1=mysqli_query($con,"select * from matchtype where typeid='1'")
    or die("Failed to query database".mysqli_error($con));
    $row1=mysqli_fetch_array($result1);
    $result2=mysqli_query($con,"select * from matchtype where typeid='3'")
    or die("Failed to query database".mysqli_error($con));
    $row2=mysqli_fetch_array($result2);
    $result3=mysqli_query($con,"select * from matchtype where typeid='5'")
    or die("Failed to query database".mysqli_error($con));
    $row3=mysqli_fetch_array($result3);
    $result4=mysqli_query($con,"select * from matchtype where typeid='7'")
    or die("Failed to query database".mysqli_error($con));
    $row4=mysqli_fetch_array($result4);
    $result5=mysqli_query($con,"select * from matchtype where typeid='9'")
    or die("Failed to query database".mysqli_error($con));
    $row5=mysqli_fetch_array($result5);
    $result6=mysqli_query($con,"select * from matchtype where typeid='11'")
    or die("Failed to query database".mysqli_error($con));
    $row6=mysqli_fetch_array($result6);
    $result7=mysqli_query($con,"select * from matchtype where typeid='13'")
    or die("Failed to query database".mysqli_error($con));
    $row7=mysqli_fetch_array($result7);
    $result8=mysqli_query($con,"select * from matchtype where typeid='15'")
    or die("Failed to query database".mysqli_error($con));
    $row8=mysqli_fetch_array($result8);
    $result9=mysqli_query($con,"select * from matchtype where typeid='17'")
    or die("Failed to query database".mysqli_error($con));
    $row9=mysqli_fetch_array($result9);
    $result10=mysqli_query($con,"select * from matchtype where typeid='19'")
    or die("Failed to query database".mysqli_error($con));
    $row10=mysqli_fetch_array($result10);
?>
<!DOCTYPE html>
<html>
<head>
	<title>GamerzZones-Matches</title>
	<link rel="shortcut icon" href="s1.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="match2.css">
	<meta charset="utf-8">
</head>
<body>
  
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo"
      aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a href="#" style="font-size:170%;" class="navbar-brand">GamerzZones</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-nav-demo">
    <ul class="nav navbar-nav">
      <li><a href="profile.php">Profile</a></li>
        <li class="active"><a href="match.php">Matches</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php">Logout <i class="fa fa-lock"></i></a></li>
        </ul>
    </div>
    </div>
    </nav>
	<div class="container">
	   <div class="jumbotron">
		   <h1>GamerzZones</h1>
		   <p>Enter Matches With A Very Little Price And Wins Huge.</p>
		   <button class="btn btn-success btn-lg" data-toggle = "modal" data-target = "#myModalforknowmore">Click Hear to Learn more </button>
	    </div>
	</div>

<div class="contain">
     <div class="box box1">
	    <ul>
   	        <li><h2>Match 1</h2></li>
   		    <li><h4>Date: __-__-__
   		    Time: __:__ __ </h4></li>
        </ul>
    
<table>

<tr>
	<th>WIN PRICE</th>
	<th>PER KILL</th>
	<th>ENTRY FEE</th>	
</tr>
<tr>
	<td align="center"><b><?php echo $row1['win_price'] ?></b></td>
	<td align="center"><b><?php echo $row1['per_kill'] ?></b></td>
	<td align="center"><b><?php echo $row1['entry_fee'] ?></b></td>
</tr>
</table>
<table>
	<tr>
		<th width="31%">TYPE</th>
		<th width="30.5%">VERSION</th>
		<th width="30%">MAP</th>
	</tr>
    <tr>
    	<td align="center" ><b><?php echo $row1['type'] ?></b></td>
    	<td align="center"><b><?php echo $row1['mode'] ?></b></td>
    	<td align="center"><b><?php echo $row1['map'] ?></b></td>
    </tr>

</table>
<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target = <?php display_players_from_match($username,'match1','#myModal1')?>>
   <?php joinorjoined($username,"match1");  ?>
</button>
<div class="progress" id="p1">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=countplayers("match1");echo($x);?>%; background-color: brown;"><?php $x=countplayers("match1");
          echo $x;
    ?> joined</div> <?php $x=countplayers("match1");
          $x1=100-$x;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $x1;
    ?> left
</div>
</div>
<div class="box box2">
    <ul>
   	        <li><h2>Match 2</h2></li>
   		    <li><h4>Date: __-__-__ 
   		    Time: __:__ __ </h4></li>
        </ul>
    
<table>

<tr>
	<th >WIN PRICE</th>
	<th>PER KILL</th>
	<th>ENTRY FEE</th>	
</tr>
<tr>
  <td align="center"><b><?php echo $row2['win_price'] ?></b></td>
  <td align="center"><b><?php echo $row2['per_kill'] ?></b></td>
  <td align="center"><b><?php echo $row2['entry_fee'] ?></b></td>  
</tr>
</table>
<table>
	<tr>
		<th width="31%">TYPE</th>
		<th width="30.5%">VERSION</th>
		<th width="30%">MAP</th>
	</tr>
    <tr>
    	<td align="center" ><b><?php echo $row2['type'] ?></b></td>
      <td align="center"><b><?php echo $row2['mode'] ?></b></td>
      <td align="center"><b><?php echo $row2['map'] ?></b></td>
    </tr>

</table>
<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target = <?php display_players_from_match($username,'match2','#myModal2')?>>
    <?php joinorjoined($username,"match2");  ?>
</button>
<div class="progress" id="p2">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=countplayers("match2");echo($x);?>%; background-color: brown;"><?php $x=countplayers("match2");
          echo $x;
    ?> joined</div> <?php $x=countplayers("match2");
          $x1=100-$x;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $x1;
    ?> left
</div>
</div>
<div class="box box3">
    <ul>
   	        <li><h2>Match 3</h2></li>
   		    <li><h4>Date: __-__-__ 
   		    Time: __:__ __ </h4></li>
        </ul>
    
<table>

<tr>
	<th>WIN PRICE</th>
	<th>PER KILL</th>
	<th>ENTRY FEE</th>	
</tr>
<tr>
	<td align="center"><b><?php echo $row3['win_price'] ?></b></td>
  <td align="center"><b><?php echo $row3['per_kill'] ?></b></td>
  <td align="center"><b><?php echo $row3['entry_fee'] ?></b></td> 
</tr>
</table>
<table>
	<tr>
		<th width="31%">TYPE</th>
		<th width="30.5%">VERSION</th>
		<th width="30%">MAP</th>
	</tr>
    <tr>
    	<td align="center" ><b><?php echo $row3['type'] ?></b></td>
      <td align="center"><b><?php echo $row3['mode'] ?></b></td>
      <td align="center"><b><?php echo $row3['map'] ?></b></td>
    </tr>

</table>
<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target = <?php display_players_from_match($username,'match3','#myModal3')?>>
    <?php joinorjoined($username,"match3");  ?>
</button>
<div class="progress" id="p3">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=countplayers("match3");echo($x);?>%; background-color: brown;"><?php $x=countplayers("match3");
          echo $x;
    ?> joined</div><span> <?php $x=countplayers("match3");
          $x1=100-$x;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $x1;
    ?> left</span>
</div>
</div>
<div class="box box4">
    <ul>
   	        <li><h2>Match 4</h2></li>
   		    <li><h4>Date: __-__-__ 
   		    Time: __:__ __ </h4></li>
        </ul>
    
<table>

<tr>
	<th >WIN PRICE</th>
	<th>PER KILL</th>
	<th>ENTRY FEE</th>	
</tr>
<tr>
	<td align="center"><b><?php echo $row4['win_price'] ?></b></td>
  <td align="center"><b><?php echo $row4['per_kill'] ?></b></td>
  <td align="center"><b><?php echo $row4['entry_fee'] ?></b></td> 
</tr>
</table>
<table>
	<tr>
		<th width="31%">TYPE</th>
		<th width="30.5%">VERSION</th>
		<th width="30%">MAP</th>
	</tr>
    <tr>
    	<td align="center" ><b><?php echo $row4['type'] ?></b></td>
      <td align="center"><b><?php echo $row4['mode'] ?></b></td>
      <td align="center"><b><?php echo $row4['map'] ?></b></td>
    </tr>

</table>
<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target = <?php display_players_from_match($username,'match4','#myModal4')?>>
    <?php joinorjoined($username,"match4");  ?>
</button>
<div class="progress" id="p4">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=countplayers("match4");echo($x);?>%; background-color: brown;"><?php $x=countplayers("match4");
          echo $x;
    ?> joined
  </div><span> <?php $x=countplayers("match4");
          $x1=100-$x;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $x1;
    ?> left</span>
</div>
</div>
<div class="box box5">
    <ul>
   	        <li><h2>Match 5</h2></li>
   		    <li><h4>Date: __-__-__ 
   		    Time: __:__ __ </h4></li>
        </ul>
    
<table>

<tr>
	<th >WIN PRICE</th>
	<th>PER KILL</th>
	<th>ENTRY FEE</th>	
</tr>
<tr>
	<td align="center"><b><?php echo $row5['win_price'] ?></b></td>
  <td align="center"><b><?php echo $row5['per_kill'] ?></b></td>
  <td align="center"><b><?php echo $row5['entry_fee'] ?></b></td> 
</tr>
</table>
<table>
	<tr>
		<th width="31%">TYPE</th>
		<th width="30.5%">VERSION</th>
		<th width="30%">MAP</th>
	</tr>
    <tr>
    	<td align="center" ><b><?php echo $row5['type'] ?></b></td>
      <td align="center"><b><?php echo $row5['mode'] ?></b></td>
      <td align="center"><b><?php echo $row5['map'] ?></b></td>
    </tr>

</table>
<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target =  <?php display_players_from_match($username,'match5','#myModal5')?>>
    <?php joinorjoined($username,"match5");  ?>
</button>
<div class="progress" id="p5">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=countplayers("match5");echo($x);?>%; background-color: brown;"><?php $x=countplayers("match5");
          echo $x;
    ?> joined</div><span> <?php $x=countplayers("match5");
          $x1=100-$x;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $x1;
    ?> left</span>
</div>
</div>
<div class="box box6">
    <ul>
   	        <li><h2>Match 6</h2></li>
   		    <li><h4>Date: __-__-__ 
   		    Time: __:__ __ </h4></li>
        </ul>
    
<table>

<tr>
	<th >WIN PRICE</th>
	<th>PER KILL</th>
	<th>ENTRY FEE</th>	
</tr>
<tr>
<td align="center"><b><?php echo $row6['win_price'] ?></b></td>
  <td align="center"><b><?php echo $row6['per_kill'] ?></b></td>
  <td align="center"><b><?php echo $row6['entry_fee'] ?></b></td>
</tr>
</table>
<table>
	<tr>
		<th width="31%">TYPE</th>
		<th width="30.5%">VERSION</th>
		<th width="30%">MAP</th>
	</tr>
    <tr>
    	<td align="center" ><b><?php echo $row6['type'] ?></b></td>
      <td align="center"><b><?php echo $row6['mode'] ?></b></td>
      <td align="center"><b><?php echo $row6['map'] ?></b></td>
    </tr>

</table>
<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target =  <?php display_players_from_match($username,'match6','#myModal6')?>>
    <?php joinorjoined($username,"match6");  ?>
</button>
<div class="progress" id="p6">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=countplayers("match6");echo($x);?>%; background-color: brown;"><?php $x=countplayers("match6");
          echo $x;
    ?> joined</div><span> <?php $x=countplayers("match6");
          $x1=100-$x;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $x1;
    ?> left</span>
</div>
</div>
<div class="box box7">
    <ul>
   	        <li><h2>Match 7</h2></li>
   		    <li><h4>Date: __-__-__ 
   		    Time: __:__ __ </h4></li>
        </ul>
    
<table>

<tr>
	<th >WIN PRICE</th>
	<th>PER KILL</th>
	<th>ENTRY FEE</th>	
</tr>
<tr>
	<td align="center"><b><?php echo $row7['win_price'] ?></b></td>
  <td align="center"><b><?php echo $row7['per_kill'] ?></b></td>
  <td align="center"><b><?php echo $row7['entry_fee'] ?></b></td>
</tr>
</table>
<table>
	<tr>
		<th width="31%">TYPE</th>
		<th width="30.5%">VERSION</th>
		<th width="30%">MAP</th>
	</tr>
    <tr>
    	<td align="center" ><b><?php echo $row6['type'] ?></b></td>
      <td align="center"><b><?php echo $row6['mode'] ?></b></td>
      <td align="center"><b><?php echo $row6['map'] ?></b></td>
    </tr>

</table>
<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target =  <?php display_players_from_match($username,'match7','#myModal7')?>>
    <?php joinorjoined($username,"match7");  ?>
</button>
<div class="progress" id="p7">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=countplayers("match7");echo($x);?>%; background-color: brown;"><?php $x=countplayers("match7");
          echo $x;
    ?> joined</div><span> <?php $x=countplayers("match7");
          $x1=100-$x;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $x1;
    ?> left</span>
</div>
</div>
<div class="box box8">
    <ul>
   	        <li><h2>Match 8</h2></li>
   		    <li><h4>Date: __-__-__ 
   		    Time: __:__ __ </h4></li>
        </ul>
    
<table>

<tr>
	<th >WIN PRICE</th>
	<th>PER KILL</th>
	<th>ENTRY FEE</th>	
</tr>
<tr>
	<td align="center"><b><?php echo $row8['win_price'] ?></b></td>
  <td align="center"><b><?php echo $row8['per_kill'] ?></b></td>
  <td align="center"><b><?php echo $row8['entry_fee'] ?></b></td>
</tr>
</table>
<table>
	<tr>
		<th width="31%">TYPE</th>
		<th width="30.5%">VERSION</th>
		<th width="30%">MAP</th>
	</tr>
    <tr>
    	<td align="center" ><b><?php echo $row8['type'] ?></b></td>
      <td align="center"><b><?php echo $row8['mode'] ?></b></td>
      <td align="center"><b><?php echo $row8['map'] ?></b></td>
    </tr>

</table>
<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target =  <?php display_players_from_match($username,'match8','#myModal8')?>>
    <?php joinorjoined($username,"match8");  ?>
</button>
<div class="progress" id="p8">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=countplayers("match8");echo($x);?>%; background-color: brown;"><?php $x=countplayers("match8");
          echo $x;
    ?> joined</div><span> <?php $x=countplayers("match8");
          $x1=100-$x;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $x1;
    ?> left</span>
</div>
</div>
<div class="box box9">
    <ul>
   	        <li><h2>Match 9</h2></li>
   		    <li><h4>Date: __-__-__ 
   		    Time: __:__ __ </h4></li>
        </ul>
    
<table>

<tr>
	<th >WIN PRICE</th>
	<th>PER KILL</th>
	<th>ENTRY FEE</th>	
</tr>
<tr>
	<td align="center"><b><?php echo $row9['win_price'] ?></b></td>
  <td align="center"><b><?php echo $row9['per_kill'] ?></b></td>
  <td align="center"><b><?php echo $row9['entry_fee'] ?></b></td>
</tr>
</table>
<table>
	<tr>
		<th width="31%">TYPE</th>
		<th width="30.5%">VERSION</th>
		<th width="30%">MAP</th>
	</tr>
    <tr>
    	<td align="center" ><b><?php echo $row9['type'] ?></b></td>
      <td align="center"><b><?php echo $row9['mode'] ?></b></td>
      <td align="center"><b><?php echo $row9['map'] ?></b></td>
    </tr>

</table>
<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target =  <?php display_players_from_match($username,'match9','#myModal9')?>>
    <?php joinorjoined($username,"match9");  ?>
</button>
<div class="progress" id="p9">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=countplayers("match9");echo($x);?>%; background-color: brown;"><?php $x=countplayers("match9");
          echo $x;
    ?> joined</div><span> <?php $x=countplayers("match9");
          $x1=100-$x;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $x1;
    ?> left</span>
</div>
</div>
<div class="box box10">
    <ul>
   	        <li><h2>Match 10</h2></li>
   		    <li><h4>Date: __-__-__ 
   		    Time: __:__ __ </h4></li>
        </ul>
    
<table>

<tr>
	<th >WIN PRICE</th>
	<th>PER KILL</th>
	<th>ENTRY FEE</th>	
</tr>
<tr>
	<td align="center"><b><?php echo $row10['win_price'] ?></b></td>
  <td align="center"><b><?php echo $row10['per_kill'] ?></b></td>
  <td align="center"><b><?php echo $row10['entry_fee'] ?></b></td>
</tr>
</table>
<table>
	<tr>
		<th width="30.5%">TYPE</th>
		<th width="30.3%">VERSION</th>
		<th width="30%">MAP</th>
	</tr>
    <tr>
    	<td align="center" ><b><?php echo $row10['type'] ?></b></td>
      <td align="center"><b><?php echo $row10['mode'] ?></b></td>
      <td align="center"><b><?php echo $row10['map'] ?></b></td>
    </tr>

</table>
<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target =<?php display_players_from_match($username,'match10','#myModal10')?>>
    <?php joinorjoined($username,"match10");  ?>
</button>
<div class="progress" id="p10">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=countplayers("match10");echo($x);?>%; background-color: brown;"><?php $x=countplayers("match10");
          echo $x;
    ?> joined</div><span> <?php $x=countplayers("match10");
          $x1=100-$x;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $x1;
    ?> left</span>
</div>
</div></div>
<div class = "modal fade" id = "myModal1" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
            	Are You Sure To Join This Match?
            </h4>
         </div>
         
         <div class = "modal-body">
			By Clicking On Join The Required Entry Fee Will Be Deducted From Your Wallet.

         </div>
         
         <div class = "modal-footer">
          <div class="join">
            <form action="2.php" method="get" >
           <button name="joinmatch" type = "submit" value="1" class = "btn btn-primary"> JOIN </button>
         </form></div>
            
         </div>
         
      </div>
   </div>
   </div>

<div class = "modal fade" id = "myModal2" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              Are You Sure To Join This Match?
            </h4>
         </div>
         
         <div class = "modal-body">
      By Clicking On Join The Required Entry Fee Will Be Deducted From Your Wallet.

         </div>
         
         <div class = "modal-footer">
          <div class="join">
            <form action="2.php" method="get" >
           <button name="joinmatch" type = "submit" value="2" class = "btn btn-primary"> JOIN </button>
         </form></div>
            
         </div>
         
      </div>
   </div>
   </div>

<div class = "modal fade" id = "myModal3" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              Are You Sure To Join This Match?
            </h4>
         </div>
         
         <div class = "modal-body">
      By Clicking On Join The Required Entry Fee Will Be Deducted From Your Wallet.

         </div>
         
         <div class = "modal-footer">
          <div class="join">
            <form action="2.php" method="get" >
           <button name="joinmatch" type = "submit" value="3" class = "btn btn-primary"> JOIN </button>
         </form></div>
            
         </div>
         
      </div>
   </div>
   </div>

<div class = "modal fade" id = "myModal4" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              Are You Sure To Join This Match?
            </h4>
         </div>
         
         <div class = "modal-body">
      By Clicking On Join The Required Entry Fee Will Be Deducted From Your Wallet.

         </div>
         
         <div class = "modal-footer">
          <div class="join">
            <form action="2.php" method="get" >
           <button name="joinmatch" type = "submit" value="4" class = "btn btn-primary"> JOIN </button>
         </form></div>
            
         </div>
         
      </div>
   </div>
   </div>

<div class = "modal fade" id = "myModal5" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              Are You Sure To Join This Match?
            </h4>
         </div>
         
         <div class = "modal-body">
      By Clicking On Join The Required Entry Fee Will Be Deducted From Your Wallet.

         </div>
         
         <div class = "modal-footer">
          <div class="join">
            <form action="2.php" method="get" >
           <button name="joinmatch" type = "submit" value="5" class = "btn btn-primary"> JOIN </button>
         </form></div>
            
         </div>
         
      </div>
   </div>
   </div>

<div class = "modal fade" id = "myModal6" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              Are You Sure To Join This Match?
            </h4>
         </div>
         
         <div class = "modal-body">
      By Clicking On Join The Required Entry Fee Will Be Deducted From Your Wallet.

         </div>
         
         <div class = "modal-footer">
          <div class="join">
            <form action="2.php" method="get" >
           <button name="joinmatch" type = "submit" value="6" class = "btn btn-primary"> JOIN </button>
         </form></div>
            
         </div>
         
      </div>
   </div>
   </div>

<div class = "modal fade" id = "myModal7" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              Are You Sure To Join This Match?
            </h4>
         </div>
         
         <div class = "modal-body">
      By Clicking On Join The Required Entry Fee Will Be Deducted From Your Wallet.

         </div>
         
         <div class = "modal-footer">
          <div class="join">
            <form action="2.php" method="get" >
           <button name="joinmatch" type = "submit" value="7" class = "btn btn-primary"> JOIN </button>
         </form></div>
            
         </div>
         
      </div>
   </div>
   </div>

<div class = "modal fade" id = "myModal8" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              Are You Sure To Join This Match?
            </h4>
         </div>
         
         <div class = "modal-body">
      By Clicking On Join The Required Entry Fee Will Be Deducted From Your Wallet.

         </div>
         
         <div class = "modal-footer">
          <div class="join">
            <form action="2.php" method="get" >
           <button name="joinmatch" type = "submit" value="8" class = "btn btn-primary"> JOIN </button>
         </form></div>
            
         </div>
         
      </div>
   </div>
   </div>

<div class = "modal fade" id = "myModal9" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              Are You Sure To Join This Match?
            </h4>
         </div>
         
         <div class = "modal-body">
      By Clicking On Join The Required Entry Fee Will Be Deducted From Your Wallet.

         </div>
         
         <div class = "modal-footer">
          <div class="join">
            <form action="2.php" method="get" >
           <button name="joinmatch" type = "submit" value="9" class = "btn btn-primary"> JOIN </button>
         </form></div>
            
         </div>
         
      </div>
   </div>
   </div>

<div class = "modal fade" id = "myModal10" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              Are You Sure To Join This Match?
            </h4>
         </div>
         
         <div class = "modal-body">
      By Clicking On Join The Required Entry Fee Will Be Deducted From Your Wallet.

         </div>
         
         <div class = "modal-footer">
          <div class="join">
            <form action="2.php" method="get" >
           <button name="joinmatch" type = "submit" value="10" class = "btn btn-primary"> JOIN </button>
         </form></div>
            
         </div>
         
      </div>
   </div>
   </div>
   <div class = "modal fade" id = "myModalforknowmore" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              Play PUBG Paid Tournaments  </h4>
         </div>
         
         <div class = "modal-body">
         <div> Now Play PUBG And Make Huge Money.</div>
         Enter Matches With Lower Entry Fee And Bag Huge Money By Winning The Game And Even Loot Money For Each Kill.
          <div>A Great Platform For All Gamers.</div>
          Most Secure Way To Add/Withdraw Money And Join Matches.
          <div>Join Matches From The Below List.</div>
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
         </div>
         
      </div>
   </div>
   </div>
 <div class = "modal fade" id = "myModalshowplayer1" tabindex = "-1" role = "dialog"  aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              ROOM ID And PASSWORD Will Be Given 5 Mins Before Time.  </h4>
         </div>
         
         <div class = "modal-body">
        <?php
        $conn=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerzZones");
          $res = mysqli_query($conn,"SELECT * FROM match1");

          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<br>";
            printf (" %s. ",$row['id'] );
            echo "&nbsp;";
            printf(" %s ",$row["username"]);
          }
          mysqli_free_result($res);
          mysqli_close($conn);
          ?>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
         </div>
         
      </div>
   </div>
   </div>
 </div>
   <div class = "modal fade" id = "myModalshowplayer2" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              ROOM ID And PASSWORD Will Be Given 5 Mins Before Time.  </h4>
         </div>
         
         <div class = "modal-body">
        <?php
        $conn=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerzZones");
          $res = mysqli_query($conn,"SELECT * FROM match2");

          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<br>";
            printf ("%s %s " ,$row['id'],$row["username"]);
          }
          mysqli_free_result($res);
          mysqli_close($conn);
          ?>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
         </div>
         
      </div>
   </div>
   </div>
 </div>
   <div class = "modal fade" id = "myModalshowplayer3" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              ROOM ID And PASSWORD Will Be Given 5 Mins Before Time.  </h4>
         </div>
         
         <div class = "modal-body">
        <?php
        $conn=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerzZones");
          $res = mysqli_query($conn,"SELECT * FROM match3");

          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<br>";
            printf ("%s %s " ,$row['id'],$row["username"]);
          }
          mysqli_free_result($res);
          mysqli_close($conn);
          ?>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
         </div>
         
      </div>
   </div>
   </div>
 </div>
   <div class = "modal fade" id = "myModalshowplayer4" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              ROOM ID And PASSWORD Will Be Given 5 Mins Before Time.  </h4>
         </div>
         
         <div class = "modal-body">
        <?php
        $conn=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerzZones");
          $res = mysqli_query($conn,"SELECT * FROM match4");

          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<br>";
            printf ("%s %s " ,$row['id'],$row["username"]);
          }
          mysqli_free_result($res);
          mysqli_close($conn);
          ?>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
         </div>
         
      </div>
   </div>
   </div>
 </div>
  <div class = "modal fade" id = "myModalshowplayer5" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              ROOM ID And PASSWORD Will Be Given 5 Mins Before Time.  </h4>
         </div>
         
         <div class = "modal-body">
        <?php
        $conn=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerzZones");
          $res = mysqli_query($conn,"SELECT * FROM match5");

          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<br>";
            printf ("%s %s " ,$row['id'],$row["username"]);
          }
          mysqli_free_result($res);
          mysqli_close($conn);
          ?>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
         </div>
         
      </div>
   </div>
   </div>
  </div>
   <div class = "modal fade" id = "myModalshowplayer6" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              ROOM ID And PASSWORD Will Be Given 5 Mins Before Time.  </h4>
         </div>
         
         <div class = "modal-body">
        <?php
        $conn=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerzZones");
          $res = mysqli_query($conn,"SELECT * FROM match6");

          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<br>";
            printf ("%s %s " ,$row['id'],$row["username"]);
          }
          mysqli_free_result($res);
          mysqli_close($conn);
          ?>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
         </div>
         
      </div>
   </div>
   </div>
 </div>
   <div class = "modal fade" id = "myModalshowplayer7" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              ROOM ID And PASSWORD Will Be Given 5 Mins Before Time.  </h4>
         </div>
         
         <div class = "modal-body">
        <?php
        $conn=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerzZones");
          $res = mysqli_query($conn,"SELECT * FROM match7");

          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<br>";
            printf ("%s %s " ,$row['id'],$row["username"]);
          }
          mysqli_free_result($res);
          mysqli_close($conn);
          ?>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
         </div>
         
      </div>
   </div>
   </div>
 </div>
   <div class = "modal fade" id = "myModalshowplayer8" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              ROOM ID And PASSWORD Will Be Given 5 Mins Before Time.  </h4>
         </div>
         
         <div class = "modal-body">
        <?php
        $conn=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerzZones");
          $res = mysqli_query($conn,"SELECT * FROM match8");

          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<br>";
            printf ("%s %s " ,$row['id'],$row["username"]);
          }
          mysqli_free_result($res);
          mysqli_close($conn);
          ?>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
         </div>
         
      </div>
   </div>
   </div>
 </div>
   <div class = "modal fade" id = "myModalshowplayer9" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              ROOM ID And PASSWORD Will Be Given 5 Mins Before Time.  </h4>
         </div>
         
         <div class = "modal-body">
        <?php
          $conn=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerzZones"); 
      $res= mysqli_query($conn,"SELECT * FROM match9");

          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<br>";
            printf ("%s %s " ,$row['id'],$row["username"]);
          }
          mysqli_free_result($res);
          mysqli_close($conn);
          ?>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
         </div>
         
      </div>
   </div>
   </div>
 </div>
   <div class = "modal fade" id = "myModalshowplayer10" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              ROOM ID And PASSWORD Will Be Given 5 Mins Before Time.  </h4>
         </div>
         
         <div class = "modal-body">
          <?php
          $conn=mysqli_connect("localhost", "sourav", "12345") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($conn,"GamerzZones");
          $res = mysqli_query($conn,"SELECT * FROM match10");

          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<br>";
            printf (" %s. ",$row['id'] );
            echo "&nbsp;";
            printf(" %s ",$row["username"]);
          }
          mysqli_free_result($res);
          mysqli_close($conn);
          ?>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
         </div>
         
      </div>
   </div>
   </div>
 </div>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <div id="foot" class="footer"><b>Copyright &copy 2019 All Rights Reserved.</b></div>

</body>
</html>