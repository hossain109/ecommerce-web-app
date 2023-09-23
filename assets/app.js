/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

$(document).ready(function () {
      $("#politique").change(function () {
            if ($('#politique').is(":checked")) {
                  $('#politique_field').css('display', 'none');
            } else {
                  $('#politique_field').css('display', 'block');
            }
      })

      $('.nav-menu').click(function (e) {
            // e.preventDefault();
            $(this).addClass('custom')
      })

      $('.page-link a').click(function (e) {
            $(this).addClass('custom')
      })
})