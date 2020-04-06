<?php
//php cette fonction permet de determiner la longueur d'une chaine.
function nmbr_carac_ch($chaine){
    $n=0;
    for ($i=0;(isset($chaine[$i])) ; $i++) { 
        $n=$n+1;
    }
    return $n;
}
// cette fonction permet de verifier si une chaine commence par une lettre majuscule.
function valid_chaine($chaine){
for ($i=0;(isset($chaine[$i])); $i++) {
	return ($chaine[0]>='A' && $chaine[0]<='Z');
}
}

//cette fonction permet de verifier la validité d'un numero de telephone (le numero commence par 77,76,78,75).
//le numero est composé de 9 chiffres.Le numero peut contenir les caracteres suivants:(-),(/),(.),espace

function verif_numero($numero){
	return (preg_match('#^(75|76|77|78)([.\-/ ]?[0-9]){7}$#',$numero));
}
// cette fonction permet de recuperer les phrase valides dans un tableau
function Rec_ph($texte){
	preg_match_all('#[A-Z]([^.!?]|([.][0-9]))*[.!?]#im',$texte,$phrase);
	$tabf=array();
	foreach ($phrase[0] as $key => $value) {
		array_push($tabf, ucfirst($value));
	}
	$n=count($tabf);
	return $n;
}

// verifie si une chaine est composée que de caractere alphabetique
function alphaCh($carac){
	$rep=true;
	for ($i=0;(isset($carac[$i])) ; $i++) { 
		if (($carac[$i]<"a" or $carac[$i]>"z") && ($carac[$i]<"A" or $carac[$i] >"Z")){
			$rep=false;
		}
	}
	return $rep;
}
//cette fonction permet de corriger un texte et de retourner le texte corrigé.
function correcteur_espace($texte){
	$texte=trim($texte);
    $correction_espace=preg_replace('#[ ]+#',' ',$texte);
    $correction_apostrophe=preg_replace('#([ ]+\' | \'[ ])#','\'',$correction_espace);
    $correction_virgule=preg_replace('#([ ]+,)#',',',$correction_apostrophe);
    $correction_point_virgule=preg_replace('#([ ]+;)#',';',$correction_virgule);
    $correction_point=preg_replace('#([ ]+\.)#','.',$correction_point_virgule);
    return $correction_point;
}

