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
  var reader = new CharReader(uri);
  var properties = {};
  properties['errors'] = [];

  properties['protocol'] = reader.readUntil(':');

  if (reader.readNextChar() !== ':') {
    properties['errors'].push('protocol should be followed by :');
    return properties;
  }

  if (reader.readNextChar() !== '?') {
    properties['errors'].push('protocol: should be followed by ?');
    return properties;
  }

  while (reader.hasNextChar()) {
    var key = reader.readUntil('=');
    if (!reader.hasNextChar() || reader.readNextChar() !== '=') {
      properties['errors'].push('key must be followed by =');
    }

    var value = reader.readUntil('&');
    if (reader.hasNextChar() && reader.readNextChar() !== '&') {
      properties['errors'].push('value must be follow by nothing or &');
    }

    if (!(key in properties)) {
      properties[key] = [];
    }
    properties[key].push(value);
  }

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

function CharReader(str) {
  this.str = str;
  this.pos = 0;
}

CharReader.prototype.hasNextChar = function() {
  return this.pos < this.str.length;
}

CharReader.prototype.getNextChar = function() {
  this.checkHasNextChar();
  return this.str.charAt(this.pos);
}

CharReader.prototype.readNextChar = function() {
  this.checkHasNextChar();
  var c = this.getNextChar();
  this.pos++;
  return c;
}

CharReader.prototype.readUntil = function(chr) {
  var str = '';
  while (this.hasNextChar() && this.getNextChar() !== chr) {
    str += this.readNextChar();
  }
  return str;
}

CharReader.prototype.checkHasNextChar = function() {
  if (!this.hasNextChar()) {
    throw new RangeError();
  }
}
