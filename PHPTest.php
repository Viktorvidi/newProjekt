<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="200">
		<title>Aufgabe1</title>
	</head>
	<body>
		<!--
			1. Eingabe zweier Daten in ein Formular via Eingabefeld mit anschließendem "absenden" und Verarbeitung:
				Ausgabe der beiden Daten formatiert nach deutscher Schreibweise(dd.mm.YYYY),sowie in UTC.
				Berechnen der Anzahl der zwischen D1 und D2 liegenden Tage.
				Ausgabe der Werktage innerhalt der beiden Daten.
				Ausgabe Datum des nächsten Montags 14 Tage nach letzem Datum.
		-->


    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<fieldset>
			<p>	
				<label for="Anfangsdatum">Anfangsdatum</label><br>
				<input type="date" name="Anfangsdatum" value=<?php echo $_GET["Anfangsdatum"]??""; ?>>
				<!--<input type="time" name="AZeit">-->
			</p>
			<p>	
				<label for="Enddatum">Enddatum</label><br>
				<input type="date" name="Enddatum" value=<?php echo $_GET["Enddatum"]??""; ?>>
				<!--<input type="time" name="EZeit">-->
			</p>			
			<p>
				<input type="submit" name="submit" value="Berechnen">
				<input type="reset" name="reset" value="Zurücksetzen" > 
			</p>
		</fieldset>	
    </form>

	<?php
		const BR="<br>";
		if($_GET){
		$DatUnix1=strtotime($_GET["Anfangsdatum"]);
		$DatUnix2=strtotime($_GET["Enddatum"]);
		$Tag=3600*24;
		

		//wandelt Unixzeit in dd.mm.YYYY um
		function dmy($Datum){
			return $Datum=date("d.m.Y",$Datum);
		}
		//Funktion für Ausgabe des Wochentag (1-7 = Mo-So)
		function wtag($Wochentag){
			return date("N",$Wochentag);
		}

		//Anzeige der eingegebenen Daten
		echo "Anfangsdatum".BR.dmy($DatUnix1).BR."Enddatum".BR.dmy($DatUnix2);
		
		//dazwischen liegende Tage
		$diff=(int)$diff=($DatUnix2-$DatUnix1)/$Tag;
		echo '<p>Es liegen '.$diff.' Tage dazwischen.</p>';
		
		$Werktag=0;
		$n=$DatUnix1;
		//Zählung der Werktage Mo-Sa
		for($i=0;$i<=$diff;$i++){
			if((wtag($n)) != 7){
				$Werktag++;
			}
			$n+=$Tag;
		}
		echo "Werktage innerhalb von ausgewähltem Zeitraum: ".$Werktag.BR;
		
		//Ausgabe Datum des nächsten Montags 14 Tage nach letztem Datum
		$offset=22-wtag($DatUnix2);
		if($offset>20)$offset=14;
		$nextMonday=$DatUnix2+$offset*$Tag;
		echo BR."Erster Montag in zwei Wochen: ".dmy($nextMonday);
		}


	echo "<pre>";
	print_r($_GET);
	echo "</pre>";
	?>

	</body>
</html>
