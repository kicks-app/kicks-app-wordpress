import $ from 'jquery';
$(document).on('turbolinks:load', () => {
  $('.hamburger').on('click', function() {
    $(this).toggleClass('is-active');
  });
});
