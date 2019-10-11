<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "webshop";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
	<style type="text/css">
		*{
			background-color: #222222;
			color: #FFFFFF;
		}
		.content{
			text-align: center;
			margin-left: auto;
			margin-right: auto;
		}
		table, tr, td{
			margin-left: auto;
			margin-right: auto;
			border-color: #FFFFFF;
			border: 1px solid;
		}
		img{
			max-width: 100px;
			max-height: 100px;
		}
		.dropdown-menu-center{
			right: auto;
		    left: 50%;
		    -webkit-transform: translate(-50%, 0);
		    -o-transform: translate(-50%, 0);
		    transform: translate(-50%, 0);
		    width: 50%;
		}
		.dropdown{
			background-color: #222222;
		}
		.dropdown-element{
			background-color: #FFFFFF;
		}
		.dropdownMenu1{
			background-color: #222222;
		}
	</style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class=content>
		<h1>Webshop</h1>
		<?php
			$sql = "SELECT * FROM items";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo "<table>";
			    while($row = $result->fetch_assoc()) {
			    	echo "<tr>";
			        echo "<td>".utf8_encode ($row["nev"]) . "</td>";
			        echo "<td>".utf8_encode ($row["leiras"]) . "</td>";
			        echo "<td>";
			        ?>
			        <img src=<?php echo $row["kep_link"];?>>
			        <?php
			        echo "</td>";
			        echo "<td>".utf8_encode ($row["ar"]) ." Ft.-" . "</td>";
			        echo "</tr>";
			    }
			    echo "</table>";
			} else {
			    echo "0 találat";
			}

		?>
		<div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <div class="dropdown">
                <button class="btn btn-block btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Pénznem <span class="caret"></span>

                </button>
                <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenu1">
                    <li class="dropdown-element"><a href="#">Action</a> 
                    </li>
                    <li class=dropdown-element><a href="#">Another action</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	</div>
</body>
<?php
	$conn->close(); 
?>
</html>

<!--
Okt 11-re

Adatbázis 

Feladatok
Egy webshopot fogunk létrehozni
Hozz létre egy adatbázist a php myadminban
Legyen egy tábla ahol a termékeket tároljuk:
Oszlopok: Id, nev, leiras, kep_link, ar. 
Tölts fel minimum 3 terméket az adatbázisba
Egy php oldalon olvasd be az adatbázist
Irasd ki vardumppal (Természetesen OOP módszerrel)
Formázd meg táblázatként
A kép linkje képként jelenjen meg
A páros és páratlan sorok nézzenek ki máshogy (más színű cellák, stb)
Színezzük a 2000 Forintnál drágább termékek árát, és  
Írjuk ki az átlagos, legdrágább, legolcsóbb termékárat
Legyen egy legördülő menü, ahol a pénznemet változtathatjuk (pl. EUR vs Ft)
Szorgalmi: élő árfolyammal (https://api.exchangeratesapi.io/latest) 
Írjunk az adatbázisba
Hozz létre egy admin oldalt (auth most még nem kell)
Ahol be lehet vinni elemeket, és az frissül az előbbi oldalon


->>