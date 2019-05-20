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
		xmlhttp.open("GET", "index.php?cible=ajax&fonction=stock-getMaisons&q=" + str, true);
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
	</div>
</div>

<div id="txtHint"></div>
