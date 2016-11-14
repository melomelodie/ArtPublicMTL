<?php
	class Modele_usagers extends TemplateDAO
	{
		public function getTable()
		{
			return "oeuvre";
		}
		

		public function nomOeuvre($id)
		{		
			try
			{
				$stmt = $this->connexion->prepare("select oeuvre.titre,oeuvre.categorieObjet,oeuvre.categorie,oeuvre.parc,oeuvre.materiaux,oeuvre.adresseCivique,oeuvre.urlImage,artiste.nom,artiste.prenom 
				from oeuvre join oeuvreartiste on oeuvre.id = oeuvreartiste.idOeuvre
				join artiste on oeuvreartiste.idArtiste = artiste.id where oeuvre.id = :id");
				
				$stmt->execute(array(":id" => $id));
				return $stmt->fetch();
				
			}	
			catch(Exception $exc)
			{
				return 0;
			}
		}
		
		
	}
?>