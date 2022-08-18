const ENDPOINT = 'https://www.jsonstore.io/b7500b390a31a7fdc2bde29c94607fda2a38bcc19368e99835309de795232577';
const URL_REGEXP = new RegExp("^(http|https|ftp)://", "i");

function getRandomString() {
  let random_string = Math.random().toString(32).substring(2, 5) + Math.random().toString(32).substring(2, 5);
  return random_string;
}

function getUrl() {
  let url = document.getElementById('txtUrl').value;
  let isProtocolOk = URL_REGEXP.test(url);
  return isProtocolOk ? url : ('http://' + url);
}

function genHash() {
  if (window.location.hash == '') {
    window.location.hash = getRandomString();
  }
}

function sendRequest(url) {
  $.ajax({
    'url': ENDPOINT + '/' + window.location.hash.substr(1) /* remove # */,
    'type': 'POST',
    'data': JSON.stringify(url),
    'dataType': 'json',
    'contentType': 'application/json; charset=utf-8'
  })
}

function shortenUrl() {
  let longUrl = getUrl();
  genHash();
  sendRequest(longUrl);
}

function checkCurentUrl() {
  let hashExisting = window.location.hash.substr(1);
  if (hashExisting) {
    $.getJSON(ENDPOINT + "/" + hashExisting,
      function (data) {
        data = data["result"];
        if (data != null) {
          window.location.href = data;
        }
      }
    )
  }
}

checkCurentUrl();