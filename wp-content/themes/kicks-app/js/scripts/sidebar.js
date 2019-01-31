import $ from 'jquery';
import { ResizeSensor } from 'css-element-queries';
import StickySidebar from 'sticky-sidebar';

let sidebar;

const SIDEBAR_SELECTOR = '.sticky-sidebar';

window.ResizeSensor = ResizeSensor;

$(document).on('ready turbolinks:load', () => {
  if (sidebar) {
    sidebar.destroy();
    sidebar = null;
  }

  const top = $('#wpadminbar').outerHeight() + $('.site-header').outerHeight();

  const sidebarElement = document.querySelector(SIDEBAR_SELECTOR);

  if (sidebarElement) {
    sidebar = new StickySidebar('.sticky-sidebar', {
      resizeSensor: true,
      topSpacing: top,
      bottomSpacing: 0,
      containerSelector: '.site-content .container',
      innerWrapperSelector: '.sidebar-inner',
      minWidth: 992 // TODO: Get bootstrap breakpoints dynamically
    });
  }
});
