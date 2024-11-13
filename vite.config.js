import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',  // Agar server bisa diakses dari luar
        port: 5173,       // Port sesuai dengan server Vite
        hmr: {
          host: 'https://short-paws-battle.loca.lt/', // Ganti dengan URL LocalTunnel untuk Vite
          protocol: 'wss',      // Gunakan WebSocket Secure
          port: 443            // Gunakan port 443 untuk HTTPS
        }
      }
});
