window.addEventListener('load', main);

function main() {
  var textarea = document.querySelector('#magnet-uri');
  textarea.addEventListener('input', handleMagnetUriInput);
}

function handleMagnetUriInput() {
  var results = document.querySelector('#results');
  results.textContent = document.querySelector('#magnet-uri').value;
}
