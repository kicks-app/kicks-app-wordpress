import $ from 'jquery';

$(window).on('show.bs.collapse hide.bs.collapse', event =>
  $(event.target)
    .parents('.navbar')
    .find('.navbar-toggler')
    .find('.hamburger')
    .toggleClass('is-active', event.type === 'show')
);
