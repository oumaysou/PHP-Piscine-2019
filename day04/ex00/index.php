<?PHP 
session_start();
if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] == 'OK')
{
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];  
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="GET">
    <p>Identifiant:</p>
    <input type="text" name="login" value="<?= $_SESSION['login'] ?>">
    <p>Mot de passe:</p>
    <input type="password" name="passwd" value="<?= $_SESSION['passwd'] ?>">
    <input type="submit" name="submit" value="OK">
</form>
</body>
</html>