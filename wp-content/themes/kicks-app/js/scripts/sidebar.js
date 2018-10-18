import $ from 'jquery';
import { ResizeSensor } from 'css-element-queries';
import StickySidebar from 'sticky-sidebar';

let sidebar;

window.ResizeSensor = ResizeSensor;

$(document).on('ready turbolinks:load', () => {
  console.log('turbolinks load', window.ResizeSensor, ResizeSensor);
  if (sidebar) {
    sidebar.destroy();
  }

  console.log('height', $('.site-header').height());

  sidebar = new StickySidebar('.sidebar', {
    resizeSensor: true,
    topSpacing: $('.site-header').height(),
    bottomSpacing: 0,
    containerSelector: '.site-content .container',
    innerWrapperSelector: '.sidebar-inner',
    minWidth: 992 // TODO: Get bootstrap breakpoints dynamically
  });
});
