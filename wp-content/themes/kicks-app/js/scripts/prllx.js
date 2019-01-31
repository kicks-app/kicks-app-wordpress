const MIN_OFFSET = 56;

const handleEvent = event => {
  window.requestAnimationFrame(() => {
    const header = document.querySelector('.site-header');
    const prllx = document.querySelectorAll('.prllx');

    for (let element of prllx) {
      const container = element.closest('.prllx-container');
      const { y, height } = element.getBoundingClientRect();
      const { y: containerY, height: containerHeight } = container && container.getBoundingClientRect();
      const d = 1 - 1 / (height / containerHeight);
      const p = window.pageYOffset / containerHeight;
      const title = container.querySelector('.stage-content');

      title.style.transform = `translateY(${p * (containerHeight * 0.1)}px) scale(${1 + p * 4})`;
      title.style.opacity = `${1 - p * 6}`;
      const ty = p * height * -d;

      element.style.transform = `translate3d(0, ${ty}px, 0)`;
    }
  });
};

window.addEventListener('resize', handleEvent);
window.addEventListener('scroll', handleEvent);
window.addEventListener('load', handleEvent);


document.addEventListener('DOMContentLoaded', handleEvent);
document.addEventListener('turbolinks:load', handleEvent);
