<?php

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

?>
<?php if($user->getAuthenticated()){ ?>
<form action="<?php echo APP_URL . '/php/w-admin-logout' ?>" method="GET">
<input type="submit" value="Log out">
</form>
<?php } ?>