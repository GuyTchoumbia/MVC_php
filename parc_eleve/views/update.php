<body onload="displayFormateur(); activeField(); checkDate(); activateDateField()">
    <h2>Modification des données du stagiaire</h2>
    <form method="POST" action="index.php?controller=update&action=update" onsubmit="return check()">
        <table>
            <tr>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Nationalité</td>
                <td>Type de formation</td>
                <td>Formateur - salle - Date debut - date fin</td>
                <td>Modification</td>
            </tr>
            <?php 
            if (isset($tStagiaire)){
                foreach ($tStagiaire as $stagiaire){
                    ?>
                    <tr>
                        <td><input type="text" name="<?php echo $stagiaire->id ?>[nom]" value="<?php echo $stagiaire->nom ?>"/></td>
                        <td><input type="text" name="<?php echo $stagiaire->id ?>[prenom]" value="<?php echo $stagiaire->prenom ?>"/></td>
                        <td><select name="<?php echo $stagiaire->id ?>[id_nationalite]">
                            <?php
                                if (isset($tNation)){
                                    foreach ($tNation as $nationalite){
                                        if ($stagiaire->id_nationalite == $nationalite->id_nationalite) 
                                            echo '<option selected value="'.$nationalite->id_nationalite.'">'.$nationalite->libelle.'</option></br>';
                                        else 
                                            echo '<option value="'.$nationalite->id_nationalite.'">'.$nationalite->libelle.' </option></br>';
                                    }
                                }
                            ?>                                    
                            </select></td>
                        <td><select class="type" name="<?php echo $stagiaire->id ?>[id_type_formation]">
                            <?php
                                if (isset($tType)){
                                    foreach ($tType as $formation){
                                        if ($formation->id_type_formation == $stagiaire->id_type_formation) 
                                            echo '<option selected value="'.$formation->id_type_formation.'">'.$formation->libelle.'</option></br>';
                                        else 
                                            echo '<option value="'.$formation->id_type_formation.'">'.$formation->libelle.' </option></br>';
                                    }
                                }
                            ?>
                            </select></td>
                        <td>
                         <?php
                        if (isset($tFormateur)){
                            echo '<fieldset class="web" name="'.$stagiaire->id.'[id_type_formation]" style="display:none">';
                            foreach ($tFormateur as $formateur){                                     
                                foreach ($formateur->type_formation as $type){                                    
                                    if ($type->id_type_formation=='5be300465efb3'){
                                        foreach ($stagiaire->stagiaire_formateur as $stagiaire_formateur){
                                            if ($stagiaire->id_type_formation == $type->id_type_formation and $stagiaire_formateur->id_formateur == $formateur->id_formateur){
                                                echo '<input type="checkbox" checked name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][id_type_formation]" value="'.$type->id_type_formation.'">'.$formateur->prenom.' '.$formateur->nom.' dans la salle '.$formateur->salle.', debut <input type="date" name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][date_debut]" value="'.$stagiaire_formateur->date_debut.'"/>, fin <input type="date" name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][date_fin]" value="'.$stagiaire_formateur->date_fin.'"/><br/>';                                                      
                                                continue 2;
                                            }                                        
                                        }
                                    echo '<input type="checkbox" name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][id_type_formation]" value="'.$type->id_type_formation.'">'.$formateur->prenom.' '.$formateur->nom.' dans la salle '.$formateur->salle.', debut <input type="date" name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][date_debut]" disabled/>, fin <input type="date" name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][date_fin]" disabled/><br/>';
                                    }
                                }      
                            }
                            echo '</fieldset>';
                            echo '<fieldset class="dev" name="'.$stagiaire->id.'[id_type_formation]" style="display:none">';   
                            foreach ($tFormateur as $formateur){
                                foreach ($formateur->type_formation as $type){
                                    if ($type->id_type_formation=='5be300465f14f'){
                                        foreach ($stagiaire->stagiaire_formateur as $stagiaire_formateur){
                                            if ($stagiaire->id_type_formation == $type->id_type_formation and $stagiaire_formateur->id_formateur == $formateur->id_formateur){
                                                echo '<input type="checkbox" checked name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][id_type_formation]" value="'.$type->id_type_formation.'">'.$formateur->prenom.' '.$formateur->nom.' dans la salle '.$formateur->salle.', debut <input type="date" name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][date_debut]" value="'.$stagiaire_formateur->date_debut.'"/>, fin <input type="date" name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][date_fin]" value="'.$stagiaire_formateur->date_fin.'"/><br/>';                                                      
                                                continue 2;
                                            }
                                        }
                                    echo '<input type="checkbox" name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][id_type_formation]" value="'.$type->id_type_formation.'">'.$formateur->prenom.' '.$formateur->nom.' dans la salle '.$formateur->salle.', debut <input type="date" name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][date_debut]" disabled/>, fin <input type="date" name="'.$stagiaire->id.'[formateur]['.$formateur->id_formateur.'][date_fin]" disabled/><br/>'; 
                                    }
                                }
                            } 
                            echo '</fieldset>';
                        }              
                        ?>
                        </td>
                        <td><input type="checkbox" name="<?php echo $stagiaire->id ?>[true]" value="<?php echo $stagiaire->id ?>"></td>
                    </tr>
                <?php
                }        
            }
            ?>
        </table>
        <input type="submit" value="Envoyer"/>
    </form>
    <br/>
    <a href='index.php?controller=delete&action=index'>Suppression d'un stagiaire</a>
    <a href='index.php?controller=insert&action=index'>Ajout d'un stagiaire</a>
</body>