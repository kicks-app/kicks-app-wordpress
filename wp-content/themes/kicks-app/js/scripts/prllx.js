const MIN_OFFSET = 56;

const header = document.querySelector('.site-header');
const prllx = document.querySelectorAll('.prllx')

const handleEvent = event => {
  window.requestAnimationFrame(() => {
    for (let element of prllx) {
      const container = element.closest('.prllx-container');
      const { y, height } = element.getBoundingClientRect();
      const { y: containerY, height: containerHeight } = container && container.getBoundingClientRect();
      const d = 1 - 1 / (height / containerHeight);

      console.log('height', height, 'd: ', d);
      console.log('page offset', window.pageYOffset, (window.pageYOffset / containerHeight) * height);
      const ty = (window.pageYOffset / containerHeight) * height * -d;

      element.style.transform = `translate3d(0, ${ty}px, 0)`;
    }
  });
};

window.addEventListener('resize', handleEvent);
window.addEventListener('scroll', handleEvent);
