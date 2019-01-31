const handleEvent = event => {
  window.requestAnimationFrame(() => {
    const stage = document.querySelector('.stage');

    if (!stage) {
      return;
    }

    const header = document.querySelector('.site-header');
    const stageHeight = stage.getBoundingClientRect().height;
    const headerHeight = header.getBoundingClientRect().height;
    const y = stageHeight - headerHeight - 50;

    document.body.classList.toggle('page-offset', window.pageYOffset > y);
  });
};

window.addEventListener('resize', handleEvent);
window.addEventListener('scroll', handleEvent);
window.addEventListener('load', handleEvent);


document.addEventListener('DOMContentLoaded', handleEvent);
document.addEventListener('turbolinks:load', handleEvent);
