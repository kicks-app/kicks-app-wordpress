import $ from 'jquery';

$('[data-toggle="offcanvas"]').click(function () {
  var $target = $($(this).attr('data-target'));
  $target.toggleClass('active');
});
