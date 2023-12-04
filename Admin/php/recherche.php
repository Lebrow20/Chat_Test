<?php
    $conn = mysqli_connect("localhost", "root", "", "txt");
    if (!$conn) {
        echo "Database not connected" . mysqli_connect_error();
    }

    $output = "";

    if (isset($_POST['keywords'])) {
        $keywords = mysqli_real_escape_string($conn, $_POST['keywords']);
        
        if (!empty($keywords)) {
            $sql = mysqli_query($conn, "SELECT * FROM textes WHERE ORIGINE LIKE '%$keywords%'");

            if ($sql) {
                if (mysqli_num_rows($sql) > 0) {
                    $output .= "<table border='1'>";
                    $output .= "<tr><th>NOM_FICHIER</th><th>TXT_REF</th><th>TXT_DATE</th><th>CONFIDENTIALITE</th><th>ACTE</th><th>SIGLE</th><th>OPER</th><th>PUB_DATE</th><th>ORIGINE</th><th>OBJET</th><th>S_KEY</th></tr>";
                    
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $output .= "<tr>
                                        <td>" . $row['NOM_FICHIER'] . "</td>                   
                                        <td>" . $row['TXT_REF'] . "</td>
                                        <td>" . $row['TXT_DATE'] . "</td>
                                        <td>" . $row['CONFIDENTIALITE'] . "</td>
                                        <td>" . $row['ACTE'] . "</td>
                                        <td>" . $row['SIGLE'] . "</td>
                                        <td>" . $row['OPER'] . "</td>
                                        <td>" . $row['PUB_DATE'] . "</td>
                                        <td>" . $row['ORIGINE'] . "</td>
                                        <td>" . $row['OBJET'] . "</td>
                                        <td>" . $row['S_KEY'] . "</td>                        
                                    </tr>";
                    }
                    $output .= "</table>";
                } else {
                    $output .= "Pas de recherche trouvée";
                }
            } else {
                $output .= "Erreur dans la requête : " . mysqli_error($conn);
            }
        } else {
            $output .= "Veuillez entrer des mots-clés pour la recherche.";
        }
    } else {
        $output .= "Aucune donnée de recherche reçue.";
    }

    echo $output;
?>