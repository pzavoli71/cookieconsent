<?php ?>

    <style>
        .ui-dialog {
            width:90% !important;
            max-height:80% !important;
            max-width:95% !important;
            display:none;
            background-color:white;/*#e5e5e5;*/
            border:3px solid gray !important;
            border-radius:10px !important;
        }
        .ui-dialog-titlebar {
            text-align: center;
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
            max-width:700px;
            margin:auto;
            border-bottom:1px solid gray;
            /*height: 30px;*/
            padding:15px;
            position:relative;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            align-content: center;
            justify-content: space-between;
            align-items: center;
        }
        fieldset {
            position:relative;
            margin-right:5px;
            right:0px;
        }
        fieldset label.ui-checkboxradio-label {
          border-color: #EEEEEE;
          background: #DDDDDD;          
        }

        .btn-check + .btn {
            background-color:#FFFFFF;
            color:#bbb6b6;
        }        
        .btn-check:checked + .btn {
            background-color:#434343;
            font-size:110%;
        }
        .btn-check.notallowed:checked + .btn {
            background-color:#a70f0f;
            font-size:110%;
        }
    </style>
    <?php 
            $this->registerJs(
            "$('.consent').dialog({
		autoOpen: true,
		modal:true,
                title:'Cookie/Privacy preferences',
		show: {
                    effect: 'blind',
                    duration: 1000
                },
                hide: {
                    effect: 'explode',
                    duration: 400
                },	
             })",
            yii\web\View::POS_READY,"scriptconsent"
            );
    ?>
    
    <div class="consent">
        <div class="titoloconsent"><h2>Privacy Preference Center</h2>
            <?php $consent =  Yii::$app->getModule('cookieconsent'); echo($consent->TextConsent['Testo']) ?><br/>
            <a href="<?=$consent->LinkPolicy?>">Cookie policy</a>
       </div>
        <br/>
        <div class="consentchoice"><div>Necessary cookies</div>
            <div>
              Needed 
            </div>        
        </div>
        <div class="consentchoice"><div>Analytics cookies</div>
            <div>
              <input type="radio" class="btn-check notallowed" name="radio-analytics" id="radio-1-1" checked>
              <label class="btn btn-secondary" for="radio-1-1">Not allowed</label>
              <input type="radio" class="btn-check" name="radio-analytics" id="radio-1-2">
              <label class="btn btn-secondary" for="radio-1-2">Allowed</label>
            </div>        
        </div>
        <div class="consentchoice"><div>Advertising cookies</div>
            <div>
              <input type="radio" class="btn-check notallowed" name="radio-advertising" id="radio-2-1" checked>
              <label class="btn btn-secondary" for="radio-2-1">Not allowed</label>
              <input type="radio" class="btn-check" name="radio-advertising" id="radio-2-2">
              <label class="btn btn-secondary" for="radio-2-2">Allowed</label>
            </div>        
        </div>
        <div class="consentchoice"><div>Personalization cookies</div>
            <div>
              <input type="radio" class="btn-check notallowed" name="radio-personalization" id="radio-3-1" checked>
              <label class="btn btn-secondary" for="radio-3-1">Not allowed</label>
              <input type="radio" class="btn-check" name="radio-personalization" id="radio-3-2">
              <label class="btn btn-secondary" for="radio-3-2">Allowed</label>
            </div>        
        </div>
        
        <br/>
        <div style="display:flex; flex-direction: row;flex-wrap: wrap;justify-content: space-evenly;  ">
        <input type="button" name="sceglitutto" value="Scegli Tutto"/>
        <input type="button" name="rimuovitutto" value="Rimuovi Tutto"/>
        <input type="button" name="conferma" value="Conferma" onclick="confirmCookies(); $('.consent').dialog('close');"/>
        </div>
    </div>
