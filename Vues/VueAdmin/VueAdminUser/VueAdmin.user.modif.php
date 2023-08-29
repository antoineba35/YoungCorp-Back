<?php
    include_once ('modeles/DAO.class.php');
    $dao = new DAO();

    $unUser = $dao->getUnProfilParId($idUser);
?>

<form action="Controleurs/CtrlModifUser.php" method="POST" class="form-user">
    <p id="message-erreur"><?php echo $message; ?></p>
    <input type="hidden" name="idUser" value=<?php echo $idUser?> />
    <input id="modifUser" name="modifUser" type="hidden" value="modif" />
    <label class="label-pseudo">Pseudo :</label>
    <input type="text" name="pseudo" required value=<?php echo $unUser->getPseudo()?> />
    <br />
    <label class="label-email">Adresse mail :</label>
    <input type="email" name="adrMail" value=<?php echo $unUser->getMail()?> required />
    <br />
    <label class="label-admin">Est admin</label>
    <?php
        if($unUser->getEstAdmin()){
            echo('<input type="checkbox" name="admin" checked>');
        }else{
            echo('<input type="checkbox" name="admin">');
        }
    ?>
    <br />
    <input type="submit" id="modifierUser" name="modifierUser" class="submit-user" value="Modifier le profil">
</form>
<br />