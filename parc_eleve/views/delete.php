
<h2>Suppression des données du stagiaire</h2>
<form method="POST" action="index.php?controller=delete&action=delete">
    <table>
        <tr>
            <td>Nom</td>
            <td>Prenom</td>
            <td>Nationalité</td>
            <td>Type de formation</td>
            <td>Formateur - salle - Date debut - date fin</td>
            <td>Suppression</td>
        </tr>
        <?php
        if (isset($tStagiaire)){
            foreach ($tStagiaire as $stagiaire){
                echo '<tr>';
                echo '<td>'.$stagiaire->nom.'</td>';
                echo '<td>'.$stagiaire->prenom.'</td>';
                echo '<td>'.$stagiaire->nationalite.'</td>';
                echo '<td>'.$stagiaire->type_formation.'</td>';
                echo '<td>';
                foreach ($stagiaire->stagiaire_formateur as $stagiaire_formateur){
                    echo $stagiaire_formateur->formateur->prenom.' '.$stagiaire_formateur->formateur->nom.' - '.$stagiaire_formateur->formateur->salle.' - '.$stagiaire_formateur->date_debut.' - '.$stagiaire_formateur->date_fin.'<br/>';
                }
                echo '</td>';

                echo '<td><input type="checkbox" name="id[]" value="'.$stagiaire->id.'"/></td>';                        
                echo '</tr>';                       
            }
        }
        ?>
        <input type="submit" value="envoyer"/>
    </table>
</form>
<br/>
<a href='index.php?controller=insert&action=index'>Ajout d'un stagiaire</a>
<a href='index.php?controller=update&action=index'>Modification d'un stagiaire</a>
