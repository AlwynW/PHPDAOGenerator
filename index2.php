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

<p>
    <label for="dbhost">DB_HOST:</label>
    <input name="dbhost" type="text" id="dbhost" value="<?=DB_HOST?>" />
    <br />
    <label for="dbname">DB NAME:</label>
    <input name="dbname" type="text" name="dbname" value="<?=DB_NAME?>" />
    <br />
    <label for="dbuser">DB_USER</label>
    :
    <input name="dbuser" type="text" id="dbuser" value="<?=DB_USER?>" />
    <br />
    <label for="dbpass">DB PASS:</label>
    <input type="text" name="dbpass" id="dbpass" value="<?=DB_PASS?>" />
	<br/>
	<label for="dbsafe">Add &lsquo; to tablenames:</label>
    <input type="checkbox" name="dbsafe" id="dbsafe" <? if (isset ($_POST['dbsafe'])) echo "checked"; ?> />
	
	<br />
    <label for="rmdir">Remove generated folder:</label>
    <input type="checkbox" name="rmdir" id="rmdir" <? if (isset ($_POST['rmdir'])) echo "checked"; ?> /><br/>
	<i>Watch out as this will remove the check to overwrite MysqlExt classes!<br/> You'll have to manually merge the resulted files with an earlier export</i>
</p>
<p>
    <?
    for($i=0;$i<count($ret);$i++){
        echo '<input name="table[]" id="field-'.$i.'" type="checkbox" value="'.$ret[$i][0].'"/><label for="field-'.$i.'">'. $ret[$i][0].'</label><br/>';
    }
    ?>
    <input type="submit" name="generate" id="generate" value="Next step" />


</p>
</form>