<?php $title = "Edit User"; ?>

<?php ob_start();?>

<form method="post" action="UsersController.php?action=edit_user&amp;id=<?= $_GET["id"]?>">
<label for="username">Username:   </label>
<input type="text" id="username" name="username" value="<?php echo $user['username'] ?>" placeholder="username" required>
<br><br>
<label for="email">Email:   </label>
<input type="text" id="email" name="email" value="<?php echo $user['email'] ?>" placeholder="email" required>
<br><br>
<label for="group">Group:   </label>
<select id="group" name="group" >
<option <?php if($user['group'] =='User') echo 'selected';?> value= "User">User</option>
<option <?php if($user['group'] =='Writer') echo 'selected';?> value= "Writer">Writer</option>
<option <?php if($user['group'] =='Admin') echo 'selected';?> value= "Admin">Admin</option>
</select>
<br><br><?php
if ($user["banned"]=='yes') {
                    echo "<label for='banned'><span>Banned: </span><input type='checkbox' id='banned'  checked></label>";
                } else {
                    echo "<label for='banned'><span>Banned: </span><input type='checkbox' id='banned'  unchecked></label>";
                }

                ?>
<br><br>
<button  type="submit" class="waves-effect blue darken-1 btn" name="submit">Modify</button>
</form><br>
<button  type="button" class="waves-effect blue darken-1 btn" onclick="location.href='UsersController.php?action=admin'">Back to Admin</button>
<?php $content = ob_get_clean(); ?>

<?php require_once("../Views/template.php");?>