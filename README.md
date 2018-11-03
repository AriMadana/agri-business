# includes/functions.php
## redirect($path) & redirectSelf($path, $error)

function redirect($path) {
	header ("Location: " . $path);
}

function redirectSelf($path, $error) {
	header ("Location: " . $path . "?error=" . $error);
}

# includes/mm_admin_class.php
## isPresentUsername() & isCorrectPassword()
