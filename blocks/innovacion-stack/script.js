/**
 * innovacion-stack: scroll-driven storytelling
 *
 * Calcula progress del scroll dentro de la sección y lo expone vía CSS vars
 * (--p, --i, --sub) + clases (.is-active, .is-prev) por data-i.
 */
(function () {
  const sections = document.querySelectorAll('.innovacion-stack');
  if (!sections.length) return;

  sections.forEach(section => {
    const sticky = section.querySelector('.innovacion-stack__sticky');
    if (!sticky) return;

    const states = parseInt(section.dataset.states, 10) || 6;
    sticky.style.setProperty('--states', states);

    let ticking = false;

    const update = () => {
      ticking = false;
      const rect = section.getBoundingClientRect();
      const total = section.offsetHeight - window.innerHeight;
      const scrolled = Math.max(0, Math.min(-rect.top, total));
      const p = total > 0 ? scrolled / total : 0;
      const idxFloat = p * states;
      const i = Math.min(states - 1, Math.floor(idxFloat));
      const sub = idxFloat - i;

      sticky.style.setProperty('--p', p);
      sticky.style.setProperty('--i', i);
      sticky.style.setProperty('--sub', sub);

      section.querySelectorAll('[data-i]').forEach(el => {
        const di = parseInt(el.dataset.i, 10);
        el.classList.toggle('is-active', di === i);
        el.classList.toggle('is-prev',   di === i - 1);
      });
    };

    const onScroll = () => {
      if (!ticking) {
        window.requestAnimationFrame(update);
        ticking = true;
      }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    update();
  });
})();
