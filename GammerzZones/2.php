<?php
	//$username=$_SESSION["username"];
    $username="Soubhik Dey";
    $con=mysqli_connect('localhost','root','');
        mysqli_select_db($con,"GamerZone");
    $result=mysqli_query($con,"select * from Users where username='$username'")
    or die("Failed to query database".mysqli_error($con));
    $row=mysqli_fetch_array($result);
    $email=$row['email'];
    $wallet=$row['wallet'];
    $phone=$row['phone'];
    function joiningmatch($username,$typeid,$wallet,$match)
    {
    	$con=mysqli_connect('localhost','root','');
        mysqli_select_db($con,"GamerZone");
    	$res=mysqli_query($con,"select entry_fee from matchtype where typeid=$typeid") or die ("Failed to query database".mysqli_error($con));
        $row=mysqli_fetch_array($res);

    	if($wallet < $row['entry_fee']){
            header('location:3.php');
                			
			}
		else{
			$result1=mysqli_query($con,"INSERT into $match (username)
            values ('$username')")or die("Failed to query database".mysqli_error($con));
            $new_wallet=$wallet-$row['entry_fee'];
            $new_match_played=$row['match_played']+'1';
            $
            $result2=mysqli_query($con,"update Users set wallet=$new_wallet,match_played=$new_match_played
            where username='$username'")or die("Failed to query database".mysqli_error($con));

            
            header('location:match.php');
			}
	}
	switch($_REQUEST['joinmatch']) {

    case '1': joiningmatch($username,'1',$wallet,'match1');
                break;

    case '2': joiningmatch($username,'3',$wallet,'match2');
                break;

    case '3': joiningmatch($username,'5',$wallet,'match3');
                break;

    case '4': joiningmatch($username,'7',$wallet,'match4');
                break;
    case '5': joiningmatch($username,'9',$wallet,'match5');
                break;

    case '6': joiningmatch($username,'11',$wallet,'match6');
                break;

    case '7': joiningmatch($username,'13',$wallet,'match7');
                break;

    case '8': joiningmatch($username,'15',$wallet,'match8');
                break;
    case '9': joiningmatch($username,'17',$wallet,'match9');
                break;

    case '10': joiningmatch($username,'19',$wallet,'match10');
                break;       
}


?>
