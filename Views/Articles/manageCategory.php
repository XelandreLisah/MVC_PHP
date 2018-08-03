<?php $title = "Manage category"; ?>

<?php ob_start();?>
<p><a href="." class="waves-effect blue darken-1 btn">Back</a></p>

<div class="row">
<div class="col s6">
  <h2>Category</h2>

  <table class="striped centered">
  <thead >
    <tr>
      <th>Name</th>
      <th></th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($cats as $values){
    echo "<tr><td>";
    echo $values['category']."</td><td>";
    ?>
    <td><a href="edit_category&amp;id=<?php echo $values['id']?>"><i class="material-icons">edit</i></a>
    <a href="delete_category&amp;id=<?php echo $values['id']?>"><i class="material-icons">delete_forever</i></a></td>
    </tr>
    <?php } ?>
  </tbody>
  </table><br /><br />
  <form method="post" action=".">
  <label for="title_category"><strong>Title:</strong> </label>
  <input type="text" id="title_category" name="title_category" required />
  <input class="waves-effect blue darken-1 btn" type="submit" value="Add Category" />
  </form>
  </div>
  <div class="col s6">
  <h2>Tag</h2>

  <table class="striped centered">
  <thead>
  <tr>
      <th>Name</th>
      <th></th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($tags as $values){
    echo "<tr><td>";
    echo $values['tag']."</td><td>";
    ?>
    <a href="delete_tag&amp;id=<?php echo $values['id']?>"><i class="material-icons">delete_forever</i></a></td>
    </tr><?php } ?>
    </tbody>    
  </table>
<br /><br />
<form method="post" action=".">
<label for="title_taf"><strong>Title:</strong> </label>
<input type="text" id="title_tag" name="title_tag" required />
<input class="waves-effect blue darken-1 btn" type="submit" value="Add Tag" />
</form>
</div>
</div>
<br /><br />
<?php $content = ob_get_clean();?>

<?php require_once "Views/template.php";