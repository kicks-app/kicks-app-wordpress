const handleEvent = event => {
  const top = document.querySelector('.site-header').getBoundingClientRect().y;

  document.body.classList.toggle('page-offset', window.pageYOffset > top);
};

window.addEventListener('resize', handleEvent);
window.addEventListener('scroll', handleEvent);
