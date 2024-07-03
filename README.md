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

**pzavoli71-cookieconsent** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
