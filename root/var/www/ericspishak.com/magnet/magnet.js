window.addEventListener('load', function() {
  var button = document.querySelector('#parse');
  button.addEventListener('click', handleParseClick);
});

function handleParseClick() {
  var results = document.querySelector('#results');
  results.textContent = document.querySelector('#magnet-uri').value;
}
