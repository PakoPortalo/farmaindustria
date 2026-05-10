import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
  base: '/wp-content/themes/farmaindustria/assets/dist/',
  build: {
    outDir: 'assets/dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'assets/js/main.js'),
        styles: resolve(__dirname, 'assets/scss/main.scss'),
      },
      output: {
        entryFileNames: 'js/[name].[hash].js',
        chunkFileNames: 'js/[name].[hash].js',
        assetFileNames: ({ name }) => {
          if (/\.css$/.test(name ?? '')) return 'css/[name].[hash][extname]';
          if (/\.(png|jpe?g|gif|svg|webp|avif)$/.test(name ?? '')) return 'img/[name].[hash][extname]';
          if (/\.(woff2?|ttf|otf|eot)$/.test(name ?? '')) return 'fonts/[name].[hash][extname]';
          return 'assets/[name].[hash][extname]';
        },
      },
    },
  },
  css: {
    preprocessorOptions: {
      scss: {
        api: 'modern-compiler',
      },
    },
  },
});
