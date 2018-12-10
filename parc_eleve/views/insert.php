<body onload="activateDateField(); checkDate(); displayFormateur()"> 
    <h2>Inserer un stagiaire en formation</h2>
    <form name="form" method="POST" action="index.php?controller=insert&action=insert" onsubmit="return validate(document)"> 
        <ul>
            <li>nom: <input type="text" name="nom"/></li>
            <li>prenom : <input type="text" name="prenom"/></li>
            <li>nationalite:  <select name="nationalite">
                                <option value="">...</option> 
                                <?php
                                if (isset($tNation)){
                                    foreach ($tNation as $nation){
                                        echo '<option value="'.$nation->id_nationalite.'">'.$nation->libelle.'</option>';                
                                    }
                                }            
                                ?> 
            </select></li>
            <li>type de formation:  <select class="type" name="type_formation">
                                        <option value="">...</option>    
                                        <?php
                                        if (isset($tType)){                                                
                                            foreach ($tType as $formation){
                                                echo '<option value="'.$formation->id_type_formation.'">'.$formation->libelle.'</option>';                
                                            }
                                        }
                                        ?>
                                        </select></li>

        </ul>
    <h2>formateurs par date</h2>            
    <?php
    if (isset($tFormateur)){
        echo '<fieldset class="web" name="type_formation" style="display:none">';
        foreach ($tFormateur as $formateur){ 
            echo '<ul>';
            foreach ($formateur->type_formation as $type){
                if ($type->id_type_formation=='5be300465efb3')
                    echo '<li><input type="checkbox" name="formateur['.$formateur->id_formateur.'][id_formateur]" value="'.$formateur->id_formateur.'">'.$formateur->prenom.' '.$formateur->nom.' dans la salle '.$formateur->salle.', debut <input type="date" name="formateur['.$formateur->id_formateur.'][date_debut]" disabled/>, fin <input type="date" name="formateur['.$formateur->id_formateur.'][date_fin]" disabled/></li>';
            }
            echo '</ul>';
        }
        echo '</fieldset>';
        echo '<fieldset class="dev" name="type_formation" style="display:none">';   
        foreach ($tFormateur as $formateur){
            echo '<ul>';
            foreach ($formateur->type_formation as $type){
                if ($type->id_type_formation=='5be300465f14f')
                echo '<li><input type="checkbox" name="formateur['.$formateur->id_formateur.'][id_formateur]" value="'.$formateur->id_formateur.'">'.$formateur->prenom.' '.$formateur->nom.' dans la salle '.$formateur->salle.', debut <input type="date" name="formateur['.$formateur->id_formateur.'][date_debut]" disabled/>, fin <input type="date" name="formateur['.$formateur->id_formateur.'][date_fin]" disabled/></li>'; 
            }
            echo '</ul>';
        } 
        echo '</fieldset>';
    }
    ?>
        <input type="submit" value="Envoyer"/> 
    </form>
    <br/>
    <a href='index.php?controller=delete&action=index'>Suppression d'un stagiaire</a>
    <a href='index.php?controller=update&action=index'>Modification d'un stagiaire</a>    
</body>
