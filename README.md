Guide d�installation du plugin PayPal Mobile
============================================

Currently, only French is supported. For English, go here: https://github.com/ontech/PayPal-Mobile-Plugin-Zen-Cart

<h2>Produit par ezimerchant</h2>

1. Cliquez sur le bouton �ZIP� en haut de la page pour t�l�charger le plugin. 

2. Si vous n�avez pas encore configur� le module PayPal Express Checkout sur Zen Cart, suivez les instructions ci-dessous. Si le module est d�j� configur�, passez directement � l��tape 3. 
  a. Connectez-vous � votre compte PayPal
  b. Sous l�onglet �Mon compte�, cliquez sur �Pr�f�rences� 
  c. Allez sur �Mes Ventes�. Dans la partie �Vendre en ligne�, vous verrez la ligne �Acc�s � l�API�. Cliquez sur �Mettre � jour �.
  d. Un nouvel �cran s�affichera. Cliquez sur �Demander des informations d�authentification API� en bas de l�option 2.  
  e. Vous aurez besoin de toutes ces donn�es pour renseigner les informations d�identification PayPal sur Zen Cart
  f. Connectez-vous � Zen Cart
  g. Allez sur Modules -> Paiement et cliquez sur PayPal Express checkout.
  h. Copiez/collez les donn�es obtenues lors de l��tape 2e. 
  i. Cliquez sur �Enregistrer�

3. Extrayez le contenu du plugin dans votre dossier �public�. mobile.php doit �tre � la racine de votre dossier �public�, qui contient le sous-r�pertoire �mobile�.  

4. Si vous avez un fichier .htaccess dans le dossier �hosting�, faites-en une sauvegarde. 

5. Fusionnez le fichier mobile.htaccess avec le fichier .htaccess (si vous en avez). Il contient la d�tection Mobile User Agent. Remarque : Si vous n�aviez pas de fichier .htaccess, renommez le fichier mobile.htaccess en .htaccess.
V�rifiez que le site Web s�affiche correctement sur votre ordinateur. 

6. Faites de m�me sur le t�l�phone et testez le processus de commande

<h2>Annuler l�installation</h2>

Annulez les modifications apport�es au fichier .htaccess ou remettez le fichier .htaccess pr�-sauvegard� pour annuler les modifications. Ceci devrait suffire � revenir � une configuration pr�c�dente 

Etapes optionnelles

Supprimez le fichier mobile.php � la racine de du dossier �public hosting�
Supprimez le sous-r�pertoire�mobile� qui a �t� cr�� pr�c�demment.
