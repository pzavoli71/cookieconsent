<?php ?>
    <style>
        .ui-dialog {
            width:90% !important;
            max-height:80% !important;
            max-width:95% !important;
            display:none;
            background-color:#cdcdcd;
            border:3px solid gray !important;
            border-radius:10px !important;
        }
        .ui-dialog * {
            /*color:white !important;*/
        }
        .consent {
            margin:auto;
        }       
        .consent h2 {
            font-style: normal !important;
            font-variant-caps: normal !important;
            font-variant-ligatures: normal !important;
            font-variant-numeric: normal !important;
            font-variant-east-asian: normal !important;
            font-variant-alternates: normal !important;
            font-kerning: auto !important;
            font-optical-sizing: auto !important;
            font-feature-settings: normal !important;
            font-variation-settings: normal !important;
            font-variant-position: normal !important;
            font-weight: 700 !important;
            font-stretch: normal !important;            
        }
        .consent a {
            text-decoration:underline;
            font-weight: 700;
        }
        .consentchoice {
            max-width:600px;
            margin:auto;
            border-bottom:1px solid gray;
            /*height: 30px;*/
            padding:15px;
        }
    </style>
    <div class="consent">
        <div class="titoloconsent"><h2>Privacy Preference Center</h2>
            Coca-Cola and Partners (“We”) use cookies, to operate our website, to show you personalized content and manage 
            our objectives as a business. You can find out more about how we use cookies below. <br/>
            You can allow all cookies, select them individually or decline them all.<br/>
            <a href="#">Cookie policy</a>
       </div>
        <br/>
        <div class="consentchoice">Necessary cookies</div>
        <div class="consentchoice">Analytics cookies</div>
        <div class="consentchoice">Advertising</div>
        <div class="consentchoice">Personalization</div>
        <br/>
        <div style="display:flex; flex-direction: row;flex-wrap: wrap;justify-content: space-evenly;  ">
        <input type="button" name="sceglitutto" value="Scegli Tutto"/>
        <input type="button" name="rimuovitutto" value="Rimuovi Tutto"/>
        <input type="button" name="conferma" value="Conferma" onclick="setCookie('cookieconsent','ok',10);$('.consent').close();"/>
        </div>
    </div>
