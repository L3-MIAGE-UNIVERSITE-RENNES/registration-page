# registration-page
TP0: Création d'une page d'enregistrement d'utilisateur

Description : L'objectif de ce TP est de créer une page web simple en PHP pour permettre aux utilisateurs de s'enregistrer sur votre site. Les utilisateurs pourront saisir leur nom, leur adresse e-mail et leur mot de passe, et les informations seront enregistrées dans un fichier texte pour une première étape.
1. Mise en place de la page d'enregistrement :
o Créez un fichier HTML nommé "register.html" avec un formulaire d'enregistrement. o Le formulaire devrait inclure les champs suivants :
▪ Nom (champ texte)
▪ Adresse e-mail (champ texte)
▪ Mot de passe (champ de mot de passe)
▪ Bouton "S'inscrire" pour soumettre le formulaire.
2. Validation des données :
o En PHP, créez un fichier "register.php" pour gérer la soumission du formulaire. o Validez les données saisies par l'utilisateur :
▪ Assurez-vous que le nom et l'adresse e-mail ne sont pas vides.
▪ Vérifiez que l'adresse e-mail a un format valide (utilisez les fonctions PHP
appropriées).
▪ Assurez-vous que le mot de passe a au moins 6 caractères.
3. Enregistrement des données :
o Si les données sont valides, enregistrez-les dans un fichier texte (par exemple, "users.txt") au
format JSON. Chaque utilisateur enregistré devrait être stocké en tant qu'objet JSON distinct dans le fichier. Vous pourrez utiliser les fonctions suivantes : json_decode,json_encode, file_get_contents, file_put_contents
Exemple de fichier json
Ce fichier contient un tableau avec 3 objets, chaque objet possède 3 paires de clefs-valeur.
o Assurez-vous de sécuriser le stockage des mots de passe (vous pouvez les hacher à l'aide de la fonction password_hash de PHP).
4. Confirmation d'enregistrement :
o Une fois les données enregistrées avec succès, redirigez l'utilisateur vers une page de
confirmation (par exemple, "registration_success.html") pour lui indiquer que son
enregistrement a réussi. 5. Gestion des erreurs :
o En cas d'erreur de validation ou d'enregistrement, redirigez l'utilisateur vers une page d'erreur (par exemple, "registration_error.html") pour afficher un message d'erreur approprié.
6. Bonus (facultatif) :
o Créez une page de connexion login.php permettant aux utilisateurs enregistrés de se
connecter à leur compte en utilisant leur adresse e-mail et leur mot de passe. La page login.php vérifiera la présence du compte utilisateur dans le fichier json. La page de compte s’appellera dashboard.php.
 
o Mettez en œuvre une vérification du nom d'utilisateur unique pour éviter les doublons. Conseils :
• Utilisez la méthode POST pour soumettre le formulaire.
• En fonction des versions php, pour valider un email, vous pouvez utiliser preg_match() qui utilise le
concept des REGEX ou filter_var() avec FILTER_VALIDATE_EMAIL
• Utilisez des sessions pour gérer l'état de l'utilisateur (par exemple, s'il est connecté ou non).
• Assurez-vous d'ajouter des messages d'erreur appropriés pour guider l'utilisateur en cas de problème.
• Notez que pour des raisons de sécurité, il est recommandé de stocker les mots de passe de manière
sécurisée (par exemple, en utilisant password_hash et password_verify en PHP).
