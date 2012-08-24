Guide d’installation du plugin PayPal Mobile
============================================

Currently, only French is supported. For English, go here: https://github.com/ontech/PayPal-Mobile-Plugin-Zen-Cart

Produit par ezimerchant

Cliquez sur le bouton ‘ZIP’ en haut de la page pour télécharger le plugin. 

Si vous n’avez pas encore configuré le module PayPal Express Checkout sur Zen Cart, suivez les instructions ci-dessous. Si le module est déjà configuré, passez directement à l’étape 3. 
a. Connectez-vous à votre compte PayPal
b. Sous l’onglet “Mon compte”, cliquez sur “Préférences” 
c. Allez sur “Mes Ventes”. Dans la partie “Vendre en ligne”, vous verrez la ligne “Accès à l’API“. Cliquez sur “Mettre à jour “.
d. Un nouvel écran s’affichera. Cliquez sur “Demander des informations d’authentification API” en bas de l’option 2.  
e. Vous aurez besoin de toutes ces données pour renseigner les informations d’identification PayPal sur Zen Cart
f. Connectez-vous à Zen Cart
g. Allez sur Modules -> Paiement et cliquez sur PayPal Express checkout.
h. Copiez/collez les données obtenues lors de l’étape 2e. 
i. Cliquez sur “Enregistrer”

Extrayez le contenu du plugin dans votre dossier ‘public’. mobile.php doit être à la racine de votre dossier ‘public’, qui contient le sous-répertoire ‘mobile’.  

Si vous avez un fichier .htaccess dans le dossier ‘hosting’, faites-en une sauvegarde. 

Fusionnez le fichier mobile.htaccess avec le fichier .htaccess (si vous en avez). Il contient la détection Mobile User Agent. Remarque : Si vous n’aviez pas de fichier .htaccess, renommez le fichier mobile.htaccess en .htaccess.
Vérifiez que le site Web s’affiche correctement sur votre ordinateur. 

Faites de même sur le téléphone et testez le processus de commande

Annuler l’installation

Annulez les modifications apportées au fichier .htaccess ou remettez le fichier .htaccess pré-sauvegardé pour annuler les modifications. Ceci devrait suffire à revenir à une configuration précédente 

Etapes optionnelles

Supprimez le fichier mobile.php à la racine de du dossier ‘public hosting’
Supprimez le sous-répertoire‘mobile’ qui a été créé précédemment.
