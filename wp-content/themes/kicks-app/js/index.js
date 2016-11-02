import $ from 'jquery';
import tether from 'tether';
import bootstrap from 'bootstrap';
import turbolinks from 'turbolinks/dist/turbolinks';
if (window.turbolinks && (!window.turbolinks.controller || !window.turbolinks.controller.started)) {
  turbolinks.start();
} 
$( () => {
  // DOM Ready
});