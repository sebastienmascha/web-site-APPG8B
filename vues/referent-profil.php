<?php 
/**
* Vue : accueil
*/
?>

<style>
<?php include "css/css_referent-profil.css"; ?>
</style>

	<table class="table">
		<tr id="tr">	
			<td colspan="3" id="td">
				<p class="p">Gaétan</p>
				<p class="p">Réferent</p>
				<p class="p"><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /> </p>
			</td>
		</tr>
		<tr id="tr" >
			<td colspan="3" id="td">
				<p class="p">Seb</p>
				<p class="p">Enfant</p>
				<p class="p"><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /></p>
			</td>
		</tr>
		<tr  id="tr">
			<td clospan="3" id="td">
				<p class="p">Gus</p>
				<p class="p">Parent</p>
				<p class="p"><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /></p>
			</td>
		</tr>
		<tr  id="tr">
			<td clospan="3" id="td">
				<p class="p">Agathe</p>
				<p class="p">Parent</p>
				<p class="p"><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /></p>
			</td>
		</tr>
		
		<tr id="tr" >
			<td clospan="3" id="td">
				<p class="p">Olivier</p>
				<p class="p">Enfant</p>
				<p class="p"><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /></p>
			</td>
		</tr>
		
		<tr id="tr">
			<td clospan="3" id="td">
				<p class="p">Astrid</p>
				<p class="p">Enfant</p>
				<p class="p"><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /></p>
			</td>
		</tr>
	</table>

<div id="editer" style="display:none">
	<h2>MODIFIER LE COMPTE</h2>
	<table id="table1">
		<tr id="tr1">
			<td id="td1">Email</td>
			<td id="td1"> <input type="email" /></td>
		</tr>
		<tr id="tr1">
			<td id="td1">Prénom </td>
			<td id="td1"><input type="text" /></td>
		</tr>
		<tr id="tr1">
			<td id="td1">Préférence </td>
			<td id="td1">
				<form>
					<SELECT name="préférence" size="1">
					<OPTION>latte
					<OPTION>café
					<OPTION>cappuccino
					<OPTION>chocolat chaud
					</SELECT>
				</form>
			</td>
		</tr>
		<tr id="tr1">
			<td id="td1">Heure de préparation </td>
			<td id="td1"><input type="time"  id="heure" name="heure"
       min="00:00" max="23:00" placeholder="heure" required/>
				
			
			</td>
		</tr>
		<tr id="tr1">
			<td id="td1">Type </td>
			<td id="td1">
				<FORM>
					<SELECT name="Type" size="1">
					<OPTION>Réferant
					<OPTION>Parent
					<OPTION>Enfant
					<OPTION>Invité
					</SELECT>
					
				</FORM>
			</td>
		</tr>
	</table>

   
   <input id ="valider"type="button" value="Valider" onclick="valider_div('editer');" />
   
</div>

<script src="js/afficher_masquer.js"></script>






	


