<?php
$filePath = '';
//check methode serveur
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //set dossier recpeption
    $uploadDir = __DIR__ . "/";
    //recup extension
    $extension = pathinfo($_FILES['profilePicture']['name'], PATHINFO_EXTENSION);
    //set chemin fichier et uniq id
    $uploadFile = $uploadDir . uniqid() . "." . basename($_FILES['profilePicture']['name']);
    //set liste d'extensions
    $extensionsOk = ['jpg', 'png', 'webp'];
    //set taille maxi en octets
    $maxFileSize = 1000000;


    //check extension
    if (!in_array($extension, $extensionsOk)) {
        echo 'Profile picture must be of type jpg png or webp';
    } else {
        //check taille du fichier et si il existe
        if (file_exists($_FILES['profilePicture']['tmp_name']) && filesize($_FILES['profilePicture']['tmp_name']) > $maxFileSize) {
            echo "Maximum picture size is 1Mo";
        } else {
            //upload depuis repertoire temp vers chemin spécifié
            move_uploaded_file($_FILES['profilePicture']['tmp_name'], $uploadFile);
            //preparation du nom du fichier pour passage dans $post pour afficher sur la page profil
            var_dump($uploadFile);
            $filePath = explode("/", $uploadFile);
            $filePath = end($filePath);
            echo 'Profile picture uploaded!';
        }
    }
    //affiche message ok ou erreurs
    if (empty($errors) && ($_FILES["profilePicture"]['error']) === !0) {
        echo 'upload error number ' . $_FILES["profilePicture"]['error'];
    }
}
?>
<!--formulaire-->
<p> Profile Picture :
<form method="post" enctype="multipart/form-data">
    <input type="file" name="profilePicture" id='imageUpload'>
    <button name='upload'>Upload</button>
</form>
</p>
<hr>
<form method="post" action='profile.php'>
    <p> Your first name <input type="text" name="firstname"></p>
    <p> Your last name <input type="text" name="lastname"></p>
    <p> Your age <input type="text" name="age"></p>
    <!-- passage URL fichier dans POST-->
    <input type="hidden" name='img-path' value="<?php echo $filePath ?>">
    <button name="submit">Submit profile</button>
</form>