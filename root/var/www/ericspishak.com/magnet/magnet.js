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

  if (!checkNextChar(uri, pos, ':')) {
    properties['errors'].push('protocol should be followed by :');
    return properties;
  }
  pos++;

  if (!checkNextChar(uri, pos, '?')) {
    properties['errors'].push('protocol: should be followed by ?');
    return properties;
  }
  pos++;

  while (pos < uri.length) {
    var key = '';
    while (pos < uri.length && !checkNextChar(uri, pos, '=')) {
      key += uri.charAt(pos);
      pos++;
    }
    pos++;
    var value = '';
    while (pos < uri.length && !checkNextChar(uri, pos, '&')) {
      value += uri.charAt(pos);
      pos++;
    }
    pos++;
    if (!(key in properties)) {
      properties[key] = [];
    }
    properties[key].push(value);
  }

  return properties;
}

function checkNextChar(str, pos, chr) {
  return pos < str.length && str.charAt(pos) == chr;
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
      dt.textContent = decodeURIComponent(key);
      var dd = document.createElement('dd');
      if (value instanceof Array) {
        if (value.length == 0) {
          continue;
        } else if (value.length == 1) {
          dd.textContent = decodeURIComponent(value[0]);
        } else {
          var ul = document.createElement('ul');
          for (var i = 0; i < value.length; i++) {
            var li = document.createElement('li');
            li.textContent = decodeURIComponent(value[i]);
            ul.appendChild(li);
          }
          dd.appendChild(ul);
        }
      } else {
        dd.textContent = decodeURIComponent(value);
      }
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