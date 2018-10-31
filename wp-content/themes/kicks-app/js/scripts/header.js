const MIN_OFFSET = 550;

const header = document.querySelector('.site-header');
const prllx = document.querySelectorAll('.prllx')

const handleEvent = event => {
  const top = header.getBoundingClientRect().top + MIN_OFFSET;

  console.log('scroll', window.pageYOffset);

  document.body.classList.toggle('page-offset', window.pageYOffset > top);
};

window.addEventListener('resize', handleEvent);
window.addEventListener('scroll', handleEvent);
