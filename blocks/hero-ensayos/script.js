/**
 * hero-ensayos:
 *   1) Logo arranca oculto + scroll BLOQUEADO en la página.
 *   2) Al primer intento de scroll (wheel/touch/tecla), dispara la curtain
 *      reveal del logo. El scroll sigue bloqueado durante la animación.
 *   3) Al terminar la animación, desbloquea el scroll. El siguiente scroll
 *      del usuario ya navega la página con normalidad.
 *
 *   Respeta prefers-reduced-motion: no bloquea scroll, muestra logo al instante.
 */
(function () {
  const sections = document.querySelectorAll('.hero-ensayos');
  if (!sections.length) return;

  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (reduced) {
    sections.forEach(s => s.classList.add('is-ready'));
    return;
  }

  const html = document.documentElement;

  // Lock scroll desde el inicio.
  window.scrollTo(0, 0);
  html.classList.add('is-hero-locked');

  let fired = false;

  const unlock = () => {
    html.classList.remove('is-hero-locked');
  };

  const fire = () => {
    if (fired) return;
    fired = true;

    sections.forEach(s => {
      s.classList.add('is-ready');
      const logo = s.querySelector('.hero-ensayos__logo');
      if (logo) {
        logo.addEventListener('animationend', unlock, { once: true });
      }
    });

    // Fallback por si animationend no dispara.
    setTimeout(unlock, 1800);
    detach();
  };

  const triggerEvents = ['wheel', 'touchmove', 'keydown'];

  const onEvent = (e) => {
    if (e.type === 'keydown') {
      const keys = ['PageDown', 'PageUp', 'ArrowDown', 'ArrowUp', 'Space', 'End', 'Home'];
      if (!keys.includes(e.code)) return;
    }
    fire();
  };

  const detach = () => {
    triggerEvents.forEach(ev => window.removeEventListener(ev, onEvent));
  };

  triggerEvents.forEach(ev => window.addEventListener(ev, onEvent, { passive: true }));
})();
