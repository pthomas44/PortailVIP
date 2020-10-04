<?php

namespace App\Gestion;

use App\Models\Intervention;
use App\Models\InterMotCle;

class GestionTableMotCle implements GestionTableMotCleInterface
{

    public function miseAJourTable()
	{

        $toutesInterventions = Intervention::all();

        foreach ($toutesInterventions as $i)
        {
            $verifIdExist = InterMotCle::where('id',$i->id)->get();
            if ($verifIdExist->isEmpty())
            {
                //construction de la chaine
                $chaine = null;
                $chaine = $i->RefDossierCli;
                $chaine = $chaine." - ".$i->StatutInterv;
                $chaine = $chaine." - ".$i->VilleLivCli;

                //insersion de la chaine

                $interMotCle = new InterMotCle;
                $interMotCle->id = $i->id;
                $interMotCle->mot_cle = $chaine;
                $interMotCle->save();
            }
        }

    }


}