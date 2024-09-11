function includeHTML() {
  var elements, i, elmnt, file, xhttp;
  elements = document.querySelectorAll('[include-html]'); // Select all elements with the include-html attribute
  for (i = 0; i < elements.length; i++) {
      elmnt = elements[i];
      file = elmnt.getAttribute('include-html'); // Get the file path from the attribute
      if (file) {
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
              if (this.readyState == 4) {
                  if (this.status == 200) {
                      elmnt.innerHTML = this.responseText;
                  } else if (this.status == 404) {
                      elmnt.innerHTML = 'Page not found.';
                  }
                  elmnt.removeAttribute('include-html'); // Remove the attribute after loading
                  includeHTML(); // Recursive call to handle nested includes
              }
          };
          xhttp.open('GET', file, true);
          xhttp.send();
          return; // Return to ensure only one file is processed at a time
      }
  }
}

includeHTML(); // Call the function to process elements with the include-html attribute
