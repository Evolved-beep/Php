<?php
// Exo 1
/* $oDate = new DateTime("02-07-2019");
echo $oDate->format("d/m/Y h:\hi");

// Exo 2

$oDate = new Datetime(14-07-2019);
echo $oDate-> format("W");

// Exo 3

$Date1 = new datetime("19-11-2020");
$Date2 = new datetime("09-07-2020");
$Jourrestant = date_diff($Date1, $Date2);
echo $Jourrestant-> format('%R%a days');

// Exo 4 







// Exo 5 
for ($i = 1; $i < 5; $i++) {
    $day = date ("d", mktime(0, 0, 0, 2, 29, date("Y")+$i));
    if ($day == 29) {
        $year = date("Y")+$i;
        echo "La prochaine année bissextile sera en ".$year;
    }
} */

// Exo 6

$datePattern = "/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/"; 
$date = 17/17/2019;

if(preg_match($datePattern,$date)) {
    echo "Date".$date."valide.<br>";
}
else {
    echo"La date".$date."est erronée";
}
?>
