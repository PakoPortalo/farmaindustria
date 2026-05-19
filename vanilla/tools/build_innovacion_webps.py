#!/usr/bin/env python3
"""
Genera assets/img/innovacion/foto-{1..6}.webp con alpha (silueta) a partir
de assets/img/innovacion/foto-{1..6}.jpeg.

La silueta sale del canal alpha de los webps "canónicos" del diseño:
  - mask_A (936x1166): silueta para data-i pares (0,2,4) — slot grande izq
  - mask_B (762x754):  silueta para data-i impares (1,3,5) — slot der

Encuadre por foto (CROP_OFFSETS): tupla (ox, oy) en rango [-1, 1]
  ox: -1 = pegado a la izq de la imagen origen, 0 = centro, 1 = pegado a la der
  oy: -1 = pegado arriba,                       0 = centro, 1 = pegado abajo
Si el aspect-ratio de la jpeg ya coincide con el del shape, el offset no hace nada
en la dimensión que no sobra.

Ejecutar desde la raíz `vanilla/`:
    python3 tools/build_innovacion_webps.py
"""
from PIL import Image
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
INNOV = ROOT / 'assets' / 'img' / 'innovacion'

# Toca aquí para mover el encuadre por foto (sin tocar CSS):
CROP_OFFSETS = {
    1: (0.0, 0.0),
    2: (0.0, 0.0),
    3: (0.0, 0.0),
    4: (0.0, 0.0),
    5: (0.0, 0.0),
    6: (0.0, 0.0),
}

# Mapeo data-i -> mask: pares usan mask_A, impares mask_B
# foto-N.jpeg corresponde a data-i = N-1
def mask_for(n):
    return MASK_A if (n - 1) % 2 == 0 else MASK_B

def cover_crop(img, tw, th, ox=0.0, oy=0.0):
    iw, ih = img.size
    tr = tw / th
    ir = iw / ih
    if ir > tr:
        new_w = int(round(ih * tr)); new_h = ih
        max_left = iw - new_w
        left = int(round((max_left / 2) * (1 + ox)))
        top = 0
    else:
        new_w = iw; new_h = int(round(iw / tr))
        max_top = ih - new_h
        left = 0
        top = int(round((max_top / 2) * (1 + oy)))
    left = max(0, min(left, iw - new_w))
    top = max(0, min(top, ih - new_h))
    return img.crop((left, top, left + new_w, top + new_h)).resize((tw, th), Image.LANCZOS)

# Carga máscaras canónicas (alpha de los webps originales del diseño).
# Si reemplazas las masks, ajusta estos paths.
MASK_A_SRC = INNOV / 'foto-1.canonical.webp'
MASK_B_SRC = INNOV / 'foto-2.canonical.webp'

# Fallback: si no existen los canonical, usa los webp actuales si tienen alpha
if not MASK_A_SRC.exists():
    MASK_A_SRC = INNOV / 'foto-1.webp'
if not MASK_B_SRC.exists():
    MASK_B_SRC = INNOV / 'foto-2.webp'

MASK_A = Image.open(MASK_A_SRC).split()[-1]
MASK_B = Image.open(MASK_B_SRC).split()[-1]
print(f'mask_A {MASK_A_SRC.name} {MASK_A.size}')
print(f'mask_B {MASK_B_SRC.name} {MASK_B.size}')

for n in range(1, 7):
    src = INNOV / f'foto-{n}.jpeg'
    if not src.exists():
        print('MISSING', src); continue
    jpeg = Image.open(src).convert('RGB')
    m = mask_for(n)
    ox, oy = CROP_OFFSETS.get(n, (0.0, 0.0))
    cropped = cover_crop(jpeg, m.size[0], m.size[1], ox, oy)
    out = cropped.convert('RGBA')
    out.putalpha(m)
    dst = INNOV / f'foto-{n}.webp'
    out.save(dst, 'WEBP', quality=92, method=6)
    print(f'foto-{n}.jpeg ({jpeg.size}) offset({ox:+.2f},{oy:+.2f}) -> foto-{n}.webp ({out.size})')
