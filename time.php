<?php
session_start();
if(isset($_SESSION['time']))
{
		 $hh=intval($_SESSION['time']/3600);
		 $mm=intval($_SESSION['time']/60);
		 $ss=intval($_SESSION['time']);
		 
		 $diff=$_SESSION['time'];
		 
		 
		$hh = floor($diff / 3600) . ' : ';
		$diff = $diff % 3600;
		$mm = floor($diff / 60) . ' : ';
		$diff = $diff % 60;
		$ss = $diff;
		 
		 
		 
		 echo $hh;
		 echo $mm;
		 echo $ss;
		 
			$_SESSION['time']=$_SESSION['time']-1;
			$hh=$_SESSION['time'];
		
		if($hh==-1 || $mm==-1 || $ss==-1)
		{
			echo "<script>window.alert('Time Up...Your dish is ready to eat..')</script>;";
			unset($_SESSION['time']);
		}
		
}

?>









