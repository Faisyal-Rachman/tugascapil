<?php
function timeleft(DateTime $date){
  $now = new DateTime();

  if($now > $date){
    return '0 second';
  }

  $interval = $date->diff($now);

  if($interval->y){
    return $interval->format("%y year").($interval->y > 1 ? 's':'');
  } else if($interval->m){
    return $interval->format("%m month").($interval->m > 1 ? 's':'');
  } else if($interval->d){
    return $interval->format("%d day").($interval->d > 1 ? 's':'');
  } else if($interval->h){
    return $interval->format("%h hour").($interval->h > 1 ? 's':'');
  } else if($interval->i){
    return $interval->format("%i minute").($interval->i > 1 ? 's':'');
  } else if($interval->s) {
    return $interval->format("%s second").($interval->s > 1 ? 's':'');
  } else {
    return 'milliseconds';
  }
  echo "$now";
}

?>