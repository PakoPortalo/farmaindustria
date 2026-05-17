#!/usr/bin/env bash
# Sirve la home vanilla en http://localhost:8765 y abre el navegador.
#
# Por qué: las máscaras CSS (mask-image) del balcón, fotos +Innovación y
# vídeo "¿Qué son los ensayos clínicos?" no cargan via file:// por la
# política de mismo-origen de Chrome/Safari. Cualquier servidor HTTP las
# desbloquea.
#
# Uso:  ./serve.sh        (o bash serve.sh)
# Stop: Ctrl+C

set -e
cd "$(dirname "$0")"

PORT="${PORT:-8765}"
URL="http://localhost:${PORT}/index.html"

if command -v python3 >/dev/null 2>&1; then
  ( sleep 1 && open "$URL" 2>/dev/null || xdg-open "$URL" 2>/dev/null || true ) &
  exec python3 -m http.server "$PORT"
else
  echo "python3 no encontrado. Instala Python 3 o usa cualquier otro servidor estático."
  exit 1
fi
