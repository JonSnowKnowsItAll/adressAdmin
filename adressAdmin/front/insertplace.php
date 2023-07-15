<?php
global $con;
if (isset($_POST['save']) and !isset($_POST['yes']) and !isset($_POST['no']))
{
    $place = $_POST['place'];
    echo 'Wollen Sie den Ort '.$place. ' wirklich hinzufügen?
          <form method="post">          
          <input type="text" name="place" value='.$place.' hidden>
          <input class="btn btn-success" type="submit" name="yes" value="Ja">
          <input class="btn btn-danger" type="submit" name="no" value="Nein">
          </form>';
}
elseif (isset($_POST['yes']))
{
    $place = $_POST['place'];
    $controlstmt = ' select count(*)
                               from ort
                              where ort_name = (?)';
    $arrayValue = array($place);
    $returnstmt = makeStatement($controlstmt, $arrayValue);
    $getcount = $returnstmt->fetch();

    if ($getcount[0] > 0)
    {
        echo 'Der Ort <b>'.$place.'</b> existiert bereits!';
    }
    else
    {
        try
        {
            $insertstmt = 'insert into ort (ort_name) value (?)';
            $arrayValue = array($place);
            makeStatement($insertstmt, $arrayValue);

            //Die neue ID der Ort auch ausgeben
            $ortID = $con->lastInsertId();
            echo '<h3>Der neue Ort <b>'.$place.'</b> wurde mit der Nr. <b>'.$ortID.'</b> hinzugefügt.</h3>';

            $query = 'select ort_id as "ID", ort_name as "Ort" from ort order by ort_id';
            showTable($query);
        }
        catch(Exception $e)
        {
            echo 'Error - Ort hinzufügen - '.$e->getCode().': '.$e->getMessage();
        }
    }
}
else
{
    echo '<h2>Vorhandene Orte:</h2>';
    $query = 'select o.ort_id as ID, o.ort_name as Ort
                from ort o
               order by o.ort_id';
    showTable($query);
    ?>
    <form method="post">
        <label for="place">Neuen Ort hinzufügen: </label>
        <input class="form-control" type="text" name="place" placeholder="zB. Wien">
        <br><input class="btn btn-primary" type="submit" name="save" value="speichern"><br>
    </form>
    <?php
}