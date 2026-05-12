/**
 * entenderlo-testimonios:
 *   1) Crossfade scroll-driven entre fondo-pildoras (módulo anterior) y fondo-bolas (este).
 *      Setea --fade en cada fondo según el progreso de entrada de .home-entenderlo-stack.
 *   2) Toggle .is-open en el <section> al click del CTA cascos (muestra overlay 3 fotos).
 */
(function () {
  const stacks = document.querySelectorAll('.home-entenderlo-stack');

  // ----- 1) Crossfade -----
  if (stacks.length) {
    const pildoras = document.querySelectorAll('.home-innovacion-stack .fondo-pildoras');
    const bolas    = document.querySelectorAll('.home-entenderlo-stack .fondo-bolas');

    let ticking = false;

    const update = () => {
      ticking = false;
      stacks.forEach(stack => {
        const rect = stack.getBoundingClientRect();
        const vh   = window.innerHeight || document.documentElement.clientHeight;
        // p=0 → top del stack aún por debajo del viewport (entrando).
        // p=1 → top del stack ha alcanzado el top del viewport (totalmente entrado).
        const p = Math.max(0, Math.min(1, (vh - rect.top) / vh));
        bolas.forEach(el    => el.style.setProperty('--fade', p.toFixed(3)));
        pildoras.forEach(el => el.style.setProperty('--fade', (1 - p).toFixed(3)));
      });
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
