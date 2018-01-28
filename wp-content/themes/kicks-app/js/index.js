import $ from 'jquery';
import popper from 'popper.js';
import bootstrap from 'bootstrap';
import turbolinks from 'turbolinks/dist/turbolinks';
import hamburgers from './modules/hamburgers';

if (turbolinks && (!turbolinks.controller || !turbolinks.controller.started)) {
  turbolinks.start();
}
