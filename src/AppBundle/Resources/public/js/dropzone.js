(function (window, document, $) {

    // variable initialization
    "use strict";
    var fileInput = document.querySelector(".input-file"),
        button = document.querySelector(".input-file-trigger")

    if (button) {
        // action lorsque la "barre d'espace" ou "Entrée" est pressée
        button.addEventListener("keydown", function (event) {
            if (event.keyCode === 13 || event.keyCode === 32) {
                fileInput.focus();
            }
        });

        // Action occuring when the label is clicked
        button.addEventListener("click", function (event) {
            fileInput.focus();
            return false;
        });
    }

    if (fileInput) {
        // displays a visual return on input:file change
        fileInput.addEventListener("change", function (event) {

            button.innerHTML = 'Selected file :' + ' ' + this.value;
        });

        fileInput.addEventListener("dragenter", function (event) {

            $('.input-file-trigger').css('background-color', '#EFEFEF');
        });
        fileInput.addEventListener("dragleave", function (event) {

            $('.input-file-trigger').css('background-color', 'white');
        });
    }

})(window, document, window.jQuery);
