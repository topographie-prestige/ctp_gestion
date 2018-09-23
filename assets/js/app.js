/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// var $ = require('jquery');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

const $ = require('jquery');
// JS is equivalent to the normal "bootstrap" package
// no need to set this to a variable, just require it
require('bootstrap');

// or you can include specific pieces
require('bootstrap/js/dist/tooltip');
require('bootstrap/js/dist/popover');

var changeTypeContrat = function() {
    if($('#contrat_type_0').is(':checked')) {
        $('#contrat_entreprise').val(null).closest('.form-group').hide();
        $('#contrat_particulier').closest('.form-group').show();
    }
    if($('#contrat_type_1').is(':checked')) {
        $('#contrat_entreprise').closest('.form-group').show();
        $('#contrat_particulier').val(null).closest('.form-group').hide();
    }
}

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
    $('#contrat_entreprise').closest('.form-group').hide();
    $('#contrat_particulier').closest('.form-group').hide();
    $('input[name*=type]').click(function() {
        changeTypeContrat();
    });
    
    changeTypeContrat();
});
