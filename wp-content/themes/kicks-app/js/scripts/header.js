window.addEventListener('scroll', event => {
  console.log('scroll', window.pageYOffset > 0);

  document.body.classList.toggle('page-offset', window.pageYOffset > 0);
})
