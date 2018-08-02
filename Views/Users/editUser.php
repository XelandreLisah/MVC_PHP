<?php $title = "Edit User"; ?>

<?php ob_start();?>
<form method="post" action="AdminController.php?action=edit_user">
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
                    echo "Banned:   <input type='checkbox' name='banned' checked>";
                } else {
                    echo "Banned:   <input type='checkbox' name='banned' unchecked>";
                }

                ?>
<br><br>
<button  type="submit" name="submit">Modify</button>
</form>
<button  type="button" onclick="location.href='UsersController.php?action=admin'">Back to Admin</button>
<?php $content = ob_get_clean(); ?>

<?php require_once("../Views/template.php");?>