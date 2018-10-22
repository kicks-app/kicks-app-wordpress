import $ from 'jquery';
import { ResizeSensor } from 'css-element-queries';
import StickySidebar from 'sticky-sidebar';

let sidebar;

window.ResizeSensor = ResizeSensor;

$(document).on('ready turbolinks:load', () => {
  if (sidebar) {
    sidebar.destroy();
  }

  console.log('admin', $('#wpadminbar').outerHeight());

  const top = $('#wpadminbar').outerHeight() + $('.site-header').outerHeight();

  sidebar = new StickySidebar('.sidebar', {
    resizeSensor: true,
    topSpacing: top,
    bottomSpacing: 0,
    containerSelector: '.site-content .container',
    innerWrapperSelector: '.sidebar-inner',
    minWidth: 992 // TODO: Get bootstrap breakpoints dynamically
  });
});
