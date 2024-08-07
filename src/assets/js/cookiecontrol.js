function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function removeCookie(cname) {
    setCookie(cname,"",-1);
}

function getCookie(cname) {
  let name = cname + "=";
  let ca = document.cookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) === ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) === 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie(nome) {
  let user = getCookie(nome);
  if (user !==  "") {
      return true;
  } else {
      return false;
  }
}

function createStringCookies(dati) {
    if ( !$('div.consent input#radio-1-1').is(':checked'))
        dati.analytics = true;
    else
        dati.analytics = false;

    if ( !$('div.consent input#radio-2-1').is(':checked'))
        dati.advertising = true;
    else
        dati.advertising = false;

    if ( !$('div.consent input#radio-3-1').is(':checked'))
        dati.personalization = true;
    else
        dati.personalization = false;
    return dati;
}

function confirmCookies(uuid) {
    dati = {};
    createStringCookies(dati);
    dati.uuid = uuid;
    stringa = JSON.stringify(dati);
    dati.stringa = stringa;
    self = this;
    $.ajax({
        url: "index.php?r=cookieconsent/cookie/save",
        data: dati,
        type: "post",
        dataType: "json",
        async: true,
        beforeSend: function (jqXHR) {
        },
        success: function (data, textStatus, jqXHR) {
            if (data.status === "success") {
               if (checkCookie('cookieconsent')) {
                   //$('.consent').dialog('close');
                   $('.consent').dialog('destroy').remove();
               }
            }
        },
        complete: function () {
            self.isChanged = false;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            self.isChanged = false;
        }
    });                                       
}
