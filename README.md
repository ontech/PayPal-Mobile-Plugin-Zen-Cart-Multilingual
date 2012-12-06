<h4><a href="#english"><img src="https://raw.github.com/ontech/PayPal-Mobile-Plugin-Zen-Cart-Multilingual/master/mobile/images/flags/gb.png" alt="English" /> English</a> | <a href="#french"><img src="https://raw.github.com/ontech/PayPal-Mobile-Plugin-Zen-Cart-Multilingual/master/mobile/images/flags/fr.png" alt="Français" /> Français</a>| <a href="#spanish"> <img src="https://raw.github.com/ontech/PayPal-Mobile-Plugin-Zen-Cart-Multilingual/master/mobile/images/flags/es.png" alt="Espanol" /> Espanol</a></h4> 

<a name="spanish">Espanol</a>
------

Instrucciones de instalación del complemento de PayPal móvil
============================================
Con tecnología ezimerchant
--------------------------

1. Haga clic en el botón 'ZIP' de la parte superior de la página para descargar el complemento.
2. Si aún no ha configurado Pago exprés de PayPal en su instalación de Zen Cart, siga estas instrucciones; si ya lo ha hecho, vaya directamente al paso 3:
 * a. Inicie sesión en su cuenta PayPal.
 * b. En la pestaña 'Mi cuenta', haga clic en 'Perfil'.
 * c. En la sección 'Vender en Internet', haga clic en el botón 'Actualizar' junto a la línea 'Acceso de API'.
 * d. Bajo la opción 2 de la pantalla siguiente, haga clic en 'Ver firma de API'.
 * e. Usará estos detalles de la página para cumplimentar las credenciales de API en Zen Cart.
 * f. Inicie sesión en Zen Cart.
 * g. Vaya a Modules -> Payment y haga clic en Pago exprés de PayPal.
 * h. Use los datos del paso 2e. (cópielos y péguelos).
 * i. Pulse Guardar.
3. Descomprima el contenido del complemento en su directorio público (excepto la carpeta 'includes'). mobile.php se encontrará en la base de su directorio público y la carpeta 'mobile' será una subcarpeta suya. Haga una copia de seguridad de su archivo .htaccess actual en su directorio de alojamiento público, si lo tiene.
4. Fusione el archivo mobile.htaccess con su archivo .htaccess existente (si ya tiene uno). Contiene la detección del agente de usuarios de móvil. Nota: si aún no tiene un archivo .htaccess, cambie el nombre de mobile.htaccess a .htaccess.
5. Compruebe que el sitio aún funciona en su ordenador de escritorio.
6. Compruebe el sitio en su teléfono y pruebe el flujo de transacciones.

Modificaciones de ZenCart para permitir el retorno al sitio móvil tras volver al escritorio.
---------------------------------------------------------------------------------------------

Con los pasos precedentes se insertaron tres archivos en el directorio 'includes' para mostrar un recuadro lateral que indicaría el momento en que un usuario de móvil volviera al escritorio. De este modo, se permite que a continuación el usuario vuelva al sitio móvil. Debe trasladar estos archivos para colocarlos bajo su propia plantilla en lugar de la ruta YOUR_TEMPLATE designada.

Descomprima la carpeta 'includes' del archivo ZIP en un directorio local.

Mire en la carpeta YOUR_TEMPLATE y cambie el nombre de la carpeta por el de la plantilla actual de su ZenCart.

Copie la carpeta 'includes' a su ubicación de ZenCart.

Inicie sesión como administrador y coloque el recuadro lateral donde desee.

Instrucciones para cancelar la instalación
-----------------------------------------
Elimine los cambios que realizó en el archivo .htacess. Alternativamente, use la copia de seguridad de .htaccess para sobrescribir los cambios. Esto debería restaurar la funcionalidad anterior.

Versiones admitidas y verificadas
----------------------
ZenCart 1.3.8h, ZenCart 1.3.9h, ZenCart 1.5.0

Pasos opcionales
----------------------

Elimine el archivo mobile.php de la carpeta raíz de su directorio de alojamiento público.

Elimine el subdirectorio móvil cargado anteriormente.

<a name="french">Français</a>
------
Guide d'installation du plugin PayPal Mobile
============================================

Produit par ezimerchant
-----------------------

1. Cliquez sur le bouton 'ZIP' en haut de la page pour télécharger le plugin. 
2. Si vous n'avez pas encore configuré le module PayPal Express Checkout sur Zen Cart, suivez les instructions ci-dessous. Si le module est déjà configuré, passez directement à l'étape 3. 
   * a. Connectez-vous à votre compte PayPal
   * b. Sous l'onglet "Mon compte", cliquez sur "Préférences" 
   * c. Allez sur "Mes Ventes". Dans la partie "Vendre en ligne", vous verrez la ligne "Accès à l'API". Cliquez sur "Mettre à jour ".
   * d. Un nouvel écran s'affichera. Cliquez sur "Demander des informations d'authentification API" en bas de l'option 2.  
   * e. Vous aurez besoin de toutes ces données pour renseigner les informations d'identification PayPal sur Zen Cart
   * f. Connectez-vous à Zen Cart
   * g. Allez sur Modules -> Paiement et cliquez sur PayPal Express checkout.
   * h. Copiez/collez les données obtenues lors de l'étape 2e. 
   * i. Cliquez sur "Enregistrer"
3. Extrayez le contenu du plugin dans votre dossier 'public'. mobile.php doit être à la racine de votre dossier 'public', qui contient le sous-répertoire 'mobile'.  
4. Si vous avez un fichier .htaccess dans le dossier 'hosting', faites-en une sauvegarde. 
5. Fusionnez le fichier mobile.htaccess avec le fichier .htaccess (si vous en avez). Il contient la détection Mobile User Agent. Remarque : Si vous n'aviez pas de fichier .htaccess, renommez le fichier mobile.htaccess en .htaccess.
Vérifiez que le site Web s'affiche correctement sur votre ordinateur. 
6. Faites de même sur le téléphone et testez le processus de commande

Annuler l'installation
----------------------

Annulez les modifications apportées au fichier .htaccess ou remettez le fichier .htaccess pré-sauvegardé pour annuler les modifications. Ceci devrait suffire à revenir à une configuration précédente 

Etapes optionnelles
-------------------

Supprimez le fichier mobile.php à la racine de du dossier 'public hosting'
Supprimez le sous-répertoire'mobile' qui a été créé précédemment.

Solution des erreurs possibles
------------------------------
Si votre installation Zencart se trouve dans un sous-dossier (par exemple : /catalog ou /zencart) alors vous devez modifier l’adresse vers le fichier mobile.php dans le fichier .htaccess

Exemple : si votre fichier mobile.php se trouve à l’adresse http://myshoppingcart.com/zencart/mobile.php alors la ligne dans .htaccess doit être la suivante :
 
RewriteRule .* /zencart/mobile.php [L] 



<a name="english">English</a>
-------
PayPal Mobile Plugin Installation Instructions
==============================================
<sup> Powered by [ezimerchant](http://ezimerchant.com/)</sup>

1. Click the 'ZIP' button at the top of this page to download the plugin.

2. If you haven't already setup PayPal Express Checkout inside your Zen Cart installation, please follow these instructions, if you have already done so, please skip to step 3:
    + a. Login into your PayPal account
    + b. Under the 'My Account' tab, click 'Profile'
    + c. Under the 'Selling Online' section, click the 'Update' button next the API Access line.
    + d. Under Option 2 on the next screen, click 'View API Signature'
    + e. You will use these details on the page to fill out the API credentials in Zen Cart.
    + f. Login to Zen Cart
    + g. Go to Modules -> Payment and click on PayPal Express checkout.
    + h. Use the details from step 2e. and copy and paste the details accross.
    + i. Hit Save.

3. Unpack the contents of the plugin into your public directory except for the includes folder. mobile.php will be in the base of your public directory, while the 'mobile' folder will be subfolder within that.

4. Make a backup of your current .htaccess file inside your public hosting directory - if you have one.

5. Merge mobile.htaccess file with your existing .htaccess file (if you already have one). This contains the mobile user agent detection.
   Note: If you do not have an existing .htaccess file, then rename the mobile.htaccess to .htaccess

6. Check the site is still functional on your desktop computer.

7. Check the site on your phone and test the transaction flow.

ZenCart Modifications to support Return to Mobile Site after going back to Desktop.
--------------------------------
1. The steps above inserted three files into your includes directory to display a sidebox that would display when a mobile user has come back to the desktop.  This allows the user to then return to the mobile site.  These files must be moved so that they are under your own template instead of the YOUR_TEMPLATE path designated.

2. Unpack the ZIP file includes folder into a local directory.

3. Search through the folder for YOUR_TEMPLATE and rename the folder to the name of the current template on your ZenCart.

4. Copy the includes folder to your ZenCart location.

5. Login as your administrator and relocate the sidebox as desired.

Revert Installation Instructions
--------------------------------

1. Remove the changes to the .htacess file that you have made. Or use the backed up .htaccess to overwrite the changes. This should restore previous functionality in itself.

### Optional Steps


2. Remove the mobile.php file in the root of your public hosting directory.

3. Remove the mobile subdirectory uploaded previously.