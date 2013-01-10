
<form id="form1" name="form1" method="post" action="index2.php">
  <p>
    <label for="dbhost">DB_HOST:</label>
    <input name="dbhost" type="text" id="dbhost" value="localhost" />
    <br />
    <label for="dbname">DB NAME:</label>
    <input name="dbname" type="text" id="dbname" />
    <br />
    <label for="dbuser">DB_USER</label>
    :
    <input name="dbuser" type="text" id="dbuser" value="root" />
    <br />
    <label for="dbpass">DB PASS:</label>
    <input type="text" name="dbpass" id="dbpass" />
	<br />
    <label for="dbsafe">Add &lsquo; to tablenames:</label>
    <input type="checkbox" name="dbsafe" id="dbsafe" />
	<br />
    <label for="rmdir">Remove generated folder:</label>
    <input type="checkbox" name="rmdir" id="rmdir" />
<br/>
	<i>Watch out as this will remove the check to overwrite MysqlExt classes!<br/> You'll have to manually merge the resulted files with an earlier export</i>
  </p>

  <p>
    <input type="submit" name="generate" id="generate" value="Next step" />
  </p>
</form>
