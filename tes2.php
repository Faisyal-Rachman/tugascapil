<?php
  $birthday = "2018-10-20";
$cur_day = date('Y-m-d');
$cur_time_arr = explode('-',$cur_day);
$birthday_arr = explode('-',$birthday);

$cur_year_b_day = $cur_time_arr[0]."-".$birthday_arr[1]."-".$birthday_arr[2];


     $diff=strtotime($cur_year_b_day)-time();//time returns current time in seconds
     $hari=floor($diff/(60*60*24));
	 $jam = floor(($diff % 86400) / 3600);
	 $bln=floor($diff/(60*60*24*30));
	 
	 echo $hari;
	 
// if(strtotime($cur_year_b_day) < time())
//	if($bln>0)
//{
  //  echo "BULAN INI ULTAH";
//	}
// if($bln=1)
// {
   // 	echo $hari;
// }
?>
