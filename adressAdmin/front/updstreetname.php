<?php
global $con;
if (isset($_POST['save']))
{
    //Daten speichern
    $strasse = $_POST['strasse'];
    $orplid = $_POST['oldstreet'];
    try {
        $updatestmt  = 'update strasse s
                           set s.str_name = (?)
                         where s.str_id = (?)';
        $arrayValue = array($strasse, $orplid);
        makeStatement($updatestmt, $arrayValue);

        $strID = $con->lastInsertId();
        echo '<h3>Die Straße '.$strasse.' wurde erfolgreich aktualisiert.</h3>';

        $query = "SELECT str_id ID, str_name Straße
                from strasse";
        showTable($query);

    }catch (Exception $e)
    {
        echo 'Error - Straße aktualisieren - '.$e->getCode().': '.$e->getMessage();
    }

}
else
{
    ?>
    <h4>Straße updaten:</h4>
    <form method="post">
        <label for="strasse">Strassenname:</label>
        <input type="text" id="strasse" class="form-control" name="strasse"
               placeholder="z.b. Wiener Straße" required><br>
    <?php
    $query='select str_id, str_name
                  from strasse
                 order by str_name';

    $stmt=$con->prepare($query);
    $stmt->execute();

    echo '<label for="oldstreet">Straße auswählen:</label><select name="oldstreet" class="form-control">';
    while($row=$stmt->fetch(PDO::FETCH_NUM))
    {
        echo '<option value="'.$row[0].'">'.$row[1];
    }
    echo '</select><br>';
    ?>
        <input class="btn btn-primary" type="submit" name="save" value="speichern"><br>
    </form>
    <?php

    echo '<h2>Vorhandene Straßen:</h2>';
    $query = "SELECT str_id ID, str_name Straße
                from strasse";
    showTable($query);
}
