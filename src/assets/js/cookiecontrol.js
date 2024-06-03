function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let ca = document.cookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  let user = getCookie("username");
  if (user != "") {
    alert("Welcome again " + user);
  } else {
    user = prompt("Please enter your name:", "");
    if (user != "" && user != null) {
      setCookie("username", user, 365);
    }
  }
}

function createStringCookies(dati) {
    if ( $('div.consent input#radio-1-1').is('checked'))
        dati.analytics = true;
    else
        dati.analytics = false;

    if ( $('div.consent input#radio-2-1').is('checked'))
        dati.advertising = true;
    else
        dati.advertising = false;

    if ( $('div.consent input#radio-3-1').is('checked'))
        dati.personalization = true;
    else
        dati.personalization = false;
    return dati;
}

function confirmCookies() {
    dati = {};
    createStringCookies(dati);
    stringa = JSON.stringify(dati);
    setCookie('cookieconsent', stringa, 365);
}