<h1 align="center">
    pzavoli71 Cookie Consent
    <hr>
</h1>
Per consentire il funzionamento di questo widget è necessario predisporre una voce nell'area modules del main.php
all'interno dello spazio "frontend". La voce deve essere del tipo:<br/>
    <code>'modules' => [
       'cookieconsent' => [
            'class' => '\pzavoli71\cookieconsent\Module',            
            'TextConsent' => [
                    'Testo' => "<b>Journey</b> site and Partners (“We”) use cookies, to operate our website, to show you personalized content and manage our objectives as a business.<br/> You can find out more about how we use cookies below.
You can allow all cookies, select them individually or decline them all.",            
            ],
            'LinkPolicy' => '/cookiepolicy.html',
           'Analytics' => true,
           'Advertising' => false,
           'Personalization' => false,
        ]        
    ],</code>

La voce <b>Linkpolicy</b> deve puntare alla pagina con il contenuto delle privacy policy.
Le voci <b>Analytics</b>, <b>Advertising</b>, <b>Personalization</b> devono essere configurate per far comparire il relativo checkbox nella pagina di scelta dei cookies.
Il campo <b>TextConsent</b> è il contenuto di testo che compare all'utente quando visualizza la maschera dei cookies.
<br/><br/>
Nel layout delle pagine visualizzate deve essere impostato il comando per rendere visibile o invisibile il dialog con la scelta dei cookies:<br/>
<code>
    <?php 
        \pzavoli71\cookieconsent\Module::addCookieConsent();
     ?>
</code>
<br/><br/>
La tabella dove verranno salvate le impostazioni dell'utente deve avere il seguente formato:<br/>
<code>
CREATE TABLE `cookieconsent` (
  `idcookie` int NOT NULL AUTO_INCREMENT,
  `IP` varchar(40) NOT NULL,
  `uuid` varchar(60) DEFAULT NULL,
  `stringa` varchar(500) DEFAULT NULL,
  `ultagg` datetime DEFAULT CURRENT_TIMESTAMP,
  `utente` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcookie`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
</code>
<br/><br/>
**pzavoli71-cookieconsent** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
