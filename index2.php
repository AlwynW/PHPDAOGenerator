<?
define('DB_HOST', $_POST['dbhost']);
define('DB_NAME', $_POST['dbname']);
define('DB_USER', $_POST['dbuser']);
define('DB_PASS', $_POST['dbpass']);
require_once('templates/class/dao/sql/Connection.class.php');
require_once('templates/class/dao/sql/ConnectionFactory.class.php');
require_once('templates/class/dao/sql/ConnectionProperty.class.php');
require_once('templates/class/dao/sql/QueryExecutor.class.php');
require_once('templates/class/dao/sql/Transaction.class.php');
require_once('templates/class/dao/sql/SqlQuery.class.php');

$sql = 'SHOW TABLES';
$ret = QueryExecutor::execute(new SqlQuery($sql));
?>
<form method="post" action="generate.php">

    <fieldset style="display: none;">
        <legend>Database information:</legend>

    <label for="dbhost">Host:</label>
    <input name="dbhost" type="text" id="dbhost" value="<?=DB_HOST?>" />
    <br />
    <label for="dbname">Name:</label>
    <input name="dbname" type="text" name="dbname" value="<?=DB_NAME?>" />
    <br />
    <label for="dbuser">Username:</label>
    :
    <input name="dbuser" type="text" id="dbuser" value="<?=DB_USER?>" />
    <br />
    <label for="dbpass">Password:</label>
    <input type="text" name="dbpass" id="dbpass" value="<?=DB_PASS?>" />
    </fieldset>

    <fieldset>
        <legend>Tables:</legend>
        <p>Select all the tables you want to generate code  <button onclick="selectAll(event);">Select all</button>
        </p>
        <?
    for($i=0;$i<count($ret);$i++){
        echo '<label><input name="table[]" type="checkbox" value="'.$ret[$i][0].'"/>'. $ret[$i][0].'</label><br/>';
    }
    ?>
    </fieldset>
    <fieldset>
        <legend>Extra options:</legend>
        <label><input type="radio" name="type" checked="checked" value="0">Vanilla PHP</label><br>
        <label><input type="radio" name="type" value="1">Codeigniter compatible factory</label>
<br><br>
        <input rel="ignore" type="checkbox" name="quote">Wrap column names with &apos;
        <br><br>
        <label for="rmdir">Overwrite everything:</label>
        <input type="checkbox" rel="ignore" name="rmdir" id="rmdir" <? if (isset ($_POST['rmdir'])) echo "checked"; ?> /><br/>
        <i>Watch out as this will remove the check to overwrite MysqlExt classes!<br/> You'll have to manually merge the resulted files with an earlier export</i>
    </fieldset>
<p>
    <input type="submit" name="generate" id="generate" value="Next step" />
</p>
</form>
<script>
    function selectAll(e) {
        if (typeof e.preventDefault != 'undefined')
            e.preventDefault();
        else {
            e.returnValue = false;
        }

        var inputs = document.getElementsByTagName('input');
        for(var i=0, l=inputs.length; i<l; i++) {
            var input = inputs[i];
            if (input.getAttribute('type') == 'checkbox' && input.getAttribute('rel')!='ignore'){
                input.checked = true; //('checked', 'checked');
            }

        }
    }
</script>