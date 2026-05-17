/**
 * Farmaindustria — home vanilla JS.
 * Concatenación de los 3 IIFEs del tema WP:
 *   1) innovacion-stack    — scroll-driven storytelling (6 estados)
 *   2) entenderlo-testimonios — crossfade pildoras↔bolas + toggle CTA cascos
 *   3) claves-cards        — scroll-driven stack (11 estados)
 */

/* ===== 1) innovacion-stack: scroll-driven storytelling ===== */
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

/* ===== 2) entenderlo-testimonios: crossfade + toggle CTA ===== */
(function () {
  const stacks = document.querySelectorAll('.home-entenderlo-stack');

  // ----- 1) Crossfade -----
  if (stacks.length) {
    const innovacion = document.querySelector('.home-innovacion-stack');

    // Ventana del crossfade: ocurre cuando el bottom de innovación va saliendo
    // por la PARTE SUPERIOR del viewport. Talento + caption + pildoras se ven
    // a tope durante todo el scroll de su estado; el fade se ejecuta solo en
    // el tramo final, donde innovación está abandonando el viewport.
    // p=0 cuando innovación bottom está FADE_VH * 100vh por debajo de viewport top.
    // p=1 cuando innovación bottom alcanza viewport top (Talento fuera de vista).
    const FADE_VH = 0.45;

    let ticking = false;

    const update = () => {
      ticking = false;
      const vh = window.innerHeight || document.documentElement.clientHeight;
      let p = 1;

      if (innovacion) {
        const r = innovacion.getBoundingClientRect();
        const win = FADE_VH * vh;
        p = Math.max(0, Math.min(1, (win - r.bottom) / win));
      }

      stacks.forEach(s => s.style.setProperty('--fade', p.toFixed(3)));
      if (innovacion) innovacion.style.setProperty('--fade', (1 - p).toFixed(3));
    };

    const onScroll = () => {
      if (!ticking) { window.requestAnimationFrame(update); ticking = true; }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    update();
  }

  // ----- 2) Toggle CTA cascos -----
  document.querySelectorAll('.entenderlo__cta').forEach(btn => {
    btn.addEventListener('click', () => {
      const section = btn.closest('.entenderlo');
      if (!section) return;
      const open = section.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  });
})();

/* ===== 3) claves-cards: scroll-driven stack ===== */
(function () {
  const sections = document.querySelectorAll('.claves-cards');
  if (!sections.length) return;

  sections.forEach(section => {
    const sticky = section.querySelector('.claves-cards__sticky');
    if (!sticky) return;

    const states = parseInt(section.dataset.states, 10) || 11;
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
        el.classList.toggle('is-prev',   di < i);
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
