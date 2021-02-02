<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Praktikum</title>
	</head>
	<body>
		<!--
			2. Erstelle einen vertikalen Farbverlauf mit PHP. Die Fläche sollte etwa 500px breit wie auch hoch sein.
				Startfarbe: #ffa500, Endfarbe: #ffffff
		-->


        <?php
            const BR="<br>";
            $Startfarbe='#ffa500';
            $Endfarbe='#ffffff';

            //Feldhöhe 
            $Zeilen=500;

            //Umwandlung von Hexadezimal in Dezimal und aufsplitten der Startfarbe in R/G/B
            $Sr=hexdec(substr($Startfarbe,1,2));
            $Sg=hexdec(substr($Startfarbe,3,2));
            $Sb=hexdec(substr($Startfarbe,5,2));
            echo $Sr.','.$Sg.','.$Sb.BR;
            
            //...Endfarbe
            $Er=hexdec(substr($Endfarbe,1,2));
            $Eg=hexdec(substr($Endfarbe,3,2));
            $Eb=hexdec(substr($Endfarbe,5,2));
            echo $Er.','.$Eg.','.$Eb.BR;

            //Additionswert pro Zeile jeweils für RGB 
            $addRot=($Er - $Sr)/($Zeilen-1);
            echo BR."Abstufungen RGB".BR.$addRot;
            
            $addGruen=($Eg - $Sg)/($Zeilen-1);
            echo BR.$addGruen;
            
            $addBlau=($Eb - $Sb)/($Zeilen-1);
            echo BR.$addBlau.BR;

            //Startwerte für Variablen in der Zählschleife gesetzt
            $Zr=$Sr;
            $Zg=$Sg;
            $Zb=$Sb;

            //'Zeile' über inline-Style definiert und in Funktion gefasst
            function farbe($Rot, $Gruen, $Blau, $breite, $hoehe) {
                return '<div style="width:'.$breite.'px; 
                height:'.$hoehe.'px;
                margin:0px;
                background-color:rgb('.(int)$Rot.','.(int)$Gruen.','.(int)$Blau.');"></div>';
                }
            
            for($i=$Zeilen;$i>0;$i--){
                
                echo farbe($Zr, $Zg, $Zb, $Zeilen, 1);
                $Zr+=$addRot;
                $Zg+=$addGruen;
                $Zb+=$addBlau;
            }  
		?>

        <br>
        <div style="background-image: linear-gradient(#ffa500, #ffffff); width:500px; height:500px;">
        linear-gradient (CSS)
        </div>
        
	</body>
</html>