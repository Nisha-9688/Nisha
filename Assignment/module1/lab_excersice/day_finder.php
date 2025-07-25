 <!-- DayFinder: Write a script that finds the current day.If it is Sunday, print "Happy Sunday." -->
  <?php
  $day=strtolower(date("l"));

  if($day == 'monday'){
    echo "<h1>Its day monday</h1><br>";
  }
  elseif($day == 'tuesday'){
    echo "<h1>Its day Tuesday</h1><br>";
  }
  elseif($day == 'wednesday'){
    echo "<h1>Its day wednesday</h1><br>";
  }
  elseif($day == 'thursday'){
    echo "<h1>Its day thursday</h1><br>";
  }
  elseif($day == 'friday'){
    echo "<h1>Its day friday</h1><br>";
  }
  elseif($day == 'saturday'){
    echo "<h1>Its day saturday</h1><br>";
  }
  elseif($day == 'sunday'){
    echo "<h1>Its happy sunday</h1><br>";
  }
  else{
    echo "<h1>There is no week</h1><br>";
  }
?>