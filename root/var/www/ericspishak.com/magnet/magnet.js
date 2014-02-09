window.addEventListener('load', main);

function main() {
  var textarea = document.querySelector('#magnet-uri');
  textarea.addEventListener('input', handleMagnetUriInput);
}

function handleMagnetUriInput() {
  var uri = document.querySelector('#magnet-uri').value;
  var properties = parseMagnetUri(uri);
  writeResults(properties);
}

function parseMagnetUri(uri) {
  var properties = {};
  properties['errors'] = [];
  var pos = 0;

  var protocol = '';
  while (pos < uri.length && uri.charAt(pos) != ':') {
    protocol += uri.charAt(pos);
    pos++;
  }
  properties['protocol'] = protocol;

  if (pos >= uri.length || uri.charAt(pos) != ':') {
    properties['errors'].push('protocol should be followed by :');
    return properties;
  }
  pos++;

  return properties;
}

function writeResults(properties) {
  var skippedProperties = ['errors'];
  writeErrors(properties['errors']);

  var results = document.querySelector('#results');
  results.innerHTML = '';

  var dl = document.createElement('dl');
  var keys = Object.keys(properties);
  for (var i = 0; i < keys.length; i++) {
    var key = keys[i];
    if (skippedProperties.indexOf(key) >= 0) {
      continue;
    }
    var value = properties[key];
    if (value) {
      var dt = document.createElement('dt');
      dt.textContent = key;
      var dd = document.createElement('dd');
      dd.textContent = value;
      dl.appendChild(dt);
      dl.appendChild(dd);
    }
  }

  if (dl.children.length > 0) {
    results.appendChild(dl);
  }
}

function writeErrors(errors) {
  var errorsElement = document.querySelector('#errors');
  errorsElement.innerHTML = '';

  if (errors.length > 0) {
    var errorsUl = document.createElement('ul');
    for (var i = 0; i < errors.length; i++) {
      var li = document.createElement('li');
      li.textContent = errors[i];
      errorsUl.appendChild(li);
    }
    errorsElement.appendChild(errorsUl);
  }
}
