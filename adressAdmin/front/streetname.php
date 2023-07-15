<?php
global $con;
if (isset($_POST['save']))
{
    //todo Daten speichern
    $strasse = $_POST['strasse'];
    try{

        $insertQuery = 'insert into strasse (str_name) values (?)';
        $arrayValue = array($strasse);
        makeStatement($insertQuery, $arrayValue);

        //Die neue ID der Straße auch ausgeben
        $strID = $con->lastInsertId();
        echo '<h3>Die neue Straße '.$strasse.' wurde mit der Nr. '.$strID.' hinzugefügt.</h3>';

        $query = 'select str_id as "ID", str_name as "Straße" from strasse order by str_id';
        showTable($query);
    } catch (Exception $e)
    {
        echo 'Error - Straße einfügen - '.$e->getCode().': '.$e->getMessage();
    }
}
else
{?>
    <form method="post">
        <label for="strasse">Straßenname:</label>
        <input type="text" id="strasse" class="form-control" name="strasse"
            placeholder="z.b. Wiener straße" required><br>
            <?php
            $query='select orpl_id, plz_nr as "PLZ", ort_name as "Ort"
            from ort_plz natural join (ort,plz)
            order by Ort';

            $stmt=$con->prepare($query);
            $stmt->execute();

            echo '<br><label for="orplid">Ortsname:</label><select name="orplid" class="form-control">';
            while($row=$stmt->fetch(PDO::FETCH_NUM))
            {
                echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2];
            }
            echo '</select><br>';
            ?>
        <br><input type ="submit" name="save" value="speichern">
    </form>
<?php
}
