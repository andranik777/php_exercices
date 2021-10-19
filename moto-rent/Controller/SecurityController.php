<?php
class SecurityController{

    // Attribut qui contiendra un objet manager
    // On pourra lutiliser pour faire la relation entre notre
    // controller et notre BDD (il est dans la couche model)
    private $userManager;

    // Appelé à la création de l'objet
    // Il initialise mon objet manager
    public function __construct(){
        $this->userManager = new UserManager();
    }

    // Fonction d'affichage des formulaires
    // Traitement des données du formulaire (connexion, erreurs ...)
    public function login(){
        $errors = [];
        // Si le type de requête est get on affiche le formulaire
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            include 'Vue/login.php';
            // Si c'est une post, on traite les erreurs et la connexion
        } else {
            // L'email est rempli
            if(empty($_POST['email'])){
                $errors[] = 'Veuillez saisir un email';
            }

            // le password est rempli
            if(empty($_POST['password'])){
                $errors[] = 'Veuillez saisir un mot de passe';
            }

            // On a créé une nouvelle fonction dans notre manager UserManager.php
            // on assigne à notre variable $userWithThisMail le résultat de la fonction
            // findByEmail. Elle renvoie un tableau d'utilisateur elle prend en paramètre
            // l'email saisie dans le formulaire.
            $userWithThisMail = $this->userManager->findOneByEmail($_POST['email']);

            // L'utilisateur n'existe pas
            if(!$userWithThisMail){
                $errors[] = 'Cet email n\'est pas connue.';
            } else {
                // On utilise le 0 pour réccupérer le premier élément du tableau
                // retourné par la fonction findByEmail
                $utilisateur = $userWithThisMail;
                // On vérifie que le mot de passe saisie correspond au hash en bdd

                if(password_verify($_POST['password'], $utilisateur->getMotDePasse())){

                    // On transforme notre objet utilisateur en chaine de caractère
                    // on le stock dans notre session
                   $_SESSION['utilisateur'] = serialize($utilisateur);
                   // Notre utilisateur est connecté nous le redirigeons
                   header("Location: index.php");
                } else {
                    // On ajoute notre message d'erreur
                    $errors[] = 'Les identifiants sont incorrects';

                }
            }
            // Si il y a des erreurs
            if(count($errors)>0){
                // Je raffiche mon formulaire de login avec les erreurs (variable errors)
                include 'Vue/login.php';
            }
        }

    }

    public function register(){

    }



}
?>