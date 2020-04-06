<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> formulaire</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	$k=0;
	include('fonction.php');
	?>
	<div class="contener">
		<form method="post" action="index.php">
			<fieldset>
				<center><legend><strong>Formulaire</legend></strong></center>
				<?php     //   Validation Nom?>
			<?php if (isset($_POST['Nom']) && valid_chaine($_POST['Nom']) && nmbr_carac_ch($_POST['Nom'])>=2 && alphaCh($_POST['Nom'] )) {
				$k++;
			?>
			<p><input type="text" name="Nom" placeholder="Nom" required value="<?php echo $_POST['Nom'];?>"><br></p>
			<?php
				  }else{
			?>
			<p><input type="text" name="Nom" placeholder="Nom" required><br></p>
			<?php
				       }
			?>

			<?php     //   Validation Prenom?>
			<?php if (isset($_POST['Prenom']) && valid_chaine($_POST['Prenom']) && nmbr_carac_ch($_POST['Prenom'])>=2 && alphaCh($_POST['Prenom'] )) {
				$k++;
			?>
			<p><input type="text" name="Prenom" placeholder="Prenom" required value="<?php echo $_POST['Prenom'];?>"><br></p>
			<?php
				  }else{
			?>
			<p><input type="text" name="Prenom" placeholder="Prenom" required ><br></p>
			<?php
				       }
			?>
			<?php     //   Validation Adresse?>
			<?php if (isset($_POST['Adresse']) && nmbr_carac_ch($_POST['Adresse'])>=5) {
				$k++;
			?>
			<p><input type="text" name="Adresse" placeholder="Adresse" required value="<?php echo $_POST['Adresse'];?>"><br></p>
			<?php
				  }else{
			?>
			<p><input type="text" name="Adresse" placeholder="Adresse" required ><br></p>
			<?php
				  }
			?>
			<?php     //   Validation Numero de telephone?>
			<?php if (isset($_POST['Numero']) && verif_numero($_POST['Numero'])) {
				$k++;
			?>
			<p><input type="text" name="Numero" placeholder="Numero" required value="<?php echo $_POST['Numero'];?>"><br></p>
			<?php
				  }else{
			?>
			<p><input type="text" name="Numero" placeholder="Numero" required ><br></p>
			<?php
				  }
			?>
			<?php     //   Confirmation Numero de telephone?>
			<?php if (isset($_POST['CNumero']) && $_POST['CNumero']==$_POST['Numero']) {
				$k++;
			?>
			<p><input type="text" name="CNumero" placeholder="Confirmation Numero" required value="<?php echo $_POST['CNumero'];?>"><br></p>
			<?php
				  }else{
			?>
			<p><input type="text" name="CNumero" placeholder="Confirmation Numero" required ><br></p>
			<?php
				  }
			?>
			<select name="Genre">
				<option value="Homme"> Homme</option>
				<option value="Femme"> Femme</option>
			</select><br>

			<strong style="color:white">Etes-vous satisfait?</strong>
			<input class=" radio" type="radio" name="Satisfait" value="Oui"  required>
			<label for="oui"> Oui</label>
			<input class=" radio" type="radio" name="Satisfait" value="Non" required>
			<label for="non"> Non</label><br><br>

			<strong style="color:white">Langues</strong><br>

			<input class=" chec" type="checkbox" name="fr[]" id="case1" value="F"><label for="case1" > Francais</label>
			<input class=" chec" type="checkbox" name="fr[]" id="case2" value="A"><label for="case2"> Anglais</label>
			<input class=" chec" type="checkbox" name="fr[]" id="case3" value="E"><label for="case3"> Espagnol</label>
			<input class=" chec" type="checkbox" name="fr[]" id="case4" value="P"><label for="case4"> Portugais</label><br><br>

			<textarea name="commentaire" rows="5" cols="48" required> Votre commentaire</textarea><br><br>

			<input class="val" type="submit" name="valider" value="Valider">
			<input class="ann" type="reset" name="valider" value="Annuler">
			</fieldset>
		</form>
		<br>
		<?php
			
			if (isset($_POST['valider']) && $k==5 && count($_POST['fr'])>=2) {
				$_SESSION['Nom'][]=$_POST['Nom'];
				$_SESSION['Prenom'][]=$_POST['Prenom'];
				$_SESSION['Adresse'][]=$_POST['Adresse'];
				$_SESSION['Numero'][]=$_POST['Numero'];
				$_SESSION['Genre'][]=$_POST['Genre'];
				$_SESSION['Satisfait'][]=$_POST['Satisfait'];
				$langue=implode(",", $_POST['fr']);
				$_SESSION['fr'][]=$langue;
				$_SESSION['tab']=[$_SESSION['Nom'],$_SESSION['Prenom'],$_SESSION['Adresse'],$_SESSION['Numero'],$_SESSION['Genre'],$_SESSION['Satisfait'],$_SESSION['fr']];

				?>
				<table>
					<tr>
						<td> Nom</td>
						<td> Prenom</td>
						<td> Adresse</td>
						<td> Numero</td>
						<td> Genre</td>
						<td> Satisfaction</td>
						<td> Langue</td>
					</tr>
			<?php
				for ($i=0; $i < count($_SESSION['tab'][0]); $i++) {
					?>
					<tr>
					<?php
					for($j=0;$j<count($_SESSION['tab']);$j++){
					?>
						<td style="background-color: salmon;text-align:left;"> <?php echo$_SESSION['tab'][$j][$i]?></td>
					<?php
					}
					?>
					</tr>
					<?php
					}
					?>
				
			</table>
			<p>Pour remplir un autre formulaire, veuillez cliquer<a href="index.php"> ici</a></p>
				<?php
			}
			elseif (isset($_POST['valider']) && $k!=5){
			?>
			<label style="background-color: red;margin-left: 60px"> Veillez renseigner les champs vides svp!</label>
			<?php	
			}elseif (isset($_POST['valider']) && count($_POST['fr'])<2){
			?>
			<label style="background-color: red;margin-left: 60px"> Veillez choisir au moins deux langues svp!</label>
			<?php
			}
			?>
	</div>
</body>
</html>
