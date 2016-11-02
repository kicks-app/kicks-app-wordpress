import $ from 'jquery';
import bootstrap from 'bootstrap-sass/assets/javascripts/bootstrap';
import turbolinks from 'turbolinks/dist/turbolinks';
if (window.turbolinks && (!window.turbolinks.controller || !window.turbolinks.controller.started)) {
  turbolinks.start();
} 

$( () => {
  // DOM Ready
});