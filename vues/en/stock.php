<?php /** * Vue : accueil */ ?>

<style>
	<?php include "css/css_stock.css";
	?>
</style>

<script>
	function placement(str) {
		if (str == "") {
			document.getElementById("txtHint").innerHTML = "";
			return;
		}
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			if (window.ActiveXObject)
				try {
					xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (e) {
					try {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {
						return NULL;
					}
				}
		}

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "vues/stock-getMaisons.php?q=" + str, true);
		xmlhttp.send();
	}
</script>

</style>

<div class=testbox>
	<img class="homestock" src="img/home.png">
	<div class="selectbox">

		<select id="selectPlacement" onchange="placement(this.value)">
			<option value="">Choisir une maison</option>
			<?php foreach ($maisons as $element) { ?>
				<option value=<?php echo $element['idMaison']; ?>> <?php echo $element['nom']; ?> <?php echo $element['location']; ?> </option>
			<?php } ?>
		</select>
		<div id="txtHint"><b></b></div>
	</div>
</div>


<ul class="machinesCafe">

	<li class="cafetiere" id="txt"><a href="#1">Maison Test</a></li>
	<li class="cafetiere"><a href="#2"> Machine chambre Sebastien </a></li>
	<li class="cafetiere"><a href="#3"> Machine chambre d'amis</a></li>
	<li class="cafetiere"><a href="#4"> Machine salon</a></li>
</ul>



<div classe="boiteprincipale">
	<div class="boite1">
		<p class="p_stock"> Café </p>
		<img class="cafe" src="./img/coffee_icon.png">
		<div class="box">
			<a href="https://www.dolce-gusto.fr/boissons/grande-morning-16-capsules" target="_blank"> <button> Commander </button> </a>
		</div>
		<br>
		<div class="progress-bar green"></div>
	</div>




	<div class="boite2">
		<p class="p_stock"> Chocolat chaud </p>
		<img class="cafe" src="./img/Chocolat.png">
		<div class="box">
			<a href="https://www.dolce-gusto.fr/boissons/chocolat/chococino-chocolat-chaud" target="_blank"> <button> Commander </button></a>
		</div>
		<br>
		<div class="progress-bar green"></div>
	</div>


	<div class="boite3">
		<p class="p_stock"> Latte </p>
		<img class="cafe" src="./img/latte.png">
		<div class="box">
			<a href="https://www.dolce-gusto.fr/boissons/cappuccino-latte/latte-macchiato" target="_blank"> <button> Commander </button> </a>
		</div>
		<br>
		<div class="progress-bar green"></div>
	</div>

	<div class="boite4">
		<p class="p_stock"> Cappuccino </p>
		<img class="cafe" src="./img/Cappuccino.png">
		<div class="box">
			<a href="https://www.dolce-gusto.fr/boissons/cappuccino-latte/cappuccino" target="_blank"> <button> Commander </button> </a>
		</div>
		<br>
		<div class="progress-bar green"></div>
	</div>
</div>
</div>