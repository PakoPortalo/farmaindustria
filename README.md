# Farmaindustria

Tema WordPress custom para la web corporativa de Farmaindustria.

## Requisitos
- LocalWP (https://localwp.com)
- Node 18+
- ACF Pro (licencia a entregar por cliente)

## Setup
1. Crear sitio LocalWP `farmaindustria` (PHP 8.2, MySQL 8).
2. Symlink este repo a `wp-content/themes/farmaindustria/` del sitio.
3. `npm install`
4. `npm run dev`
5. Activar tema en WP admin.
6. Subir y activar ACF Pro con licencia.

## Scripts
- `npm run dev` — Vite watch.
- `npm run build` — build producción.

## Convenciones
- Conventional Commits en español (`feat:`, `fix:`, `style:`, `refactor:`, `docs:`, `chore:`).
- Funciones PHP con prefijo `fi_`, constantes con prefijo `FI_`.
- SCSS BEM. Tokens en `assets/scss/_tokens.scss`.
- Cada bloque ACF en `blocks/<nombre>/` con `block.json` + `render.php` + `style.scss`.
- ACF JSON sync automático a `acf-json/` (versionado).
