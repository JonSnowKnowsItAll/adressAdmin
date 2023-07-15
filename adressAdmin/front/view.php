<?php
echo '<h2>Alle Adressen ausgeben</h2>';
$query = "SELECT s.str_name Straße, p.plz_nr PLZ, o.ort_name Ort 
            FROM adresse.strasse_ort_plz sop
            LEFT JOIN adresse.strasse s ON sop.str_id = s.str_id
            LEFT JOIN adresse.ort_plz op ON sop.orpl_id = op.orpl_id
            LEFT JOIN adresse.ort o ON op.ort_id = o.ort_id
            LEFT JOIN adresse.plz p ON op.plz_id = p.plz_id";
showTable($query);






