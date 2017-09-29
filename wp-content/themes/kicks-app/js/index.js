import $ from 'jquery';
import popper from 'popper.js';
import bootstrap from 'bootstrap';
import turbolinks from 'turbolinks/dist/turbolinks';

if (window.turbolinks && (!window.turbolinks.controller || !window.turbolinks.controller.started)) {
  turbolinks.start();
}
