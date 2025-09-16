# Panduan Auto-Deployment GitHub ke cPanel untuk Laravel

## Langkah-langkah Setup Auto-Deployment

### 1. **Edit File .cpanel.yml**
File `.cpanel.yml` sudah dibuat di root project. **PENTING**: Ganti `your-username` dengan username cPanel Anda yang sebenarnya.

### 2. **Setup di cPanel**

#### a. Login ke cPanel
- Masuk ke cPanel hosting Anda
- Cari menu "Git Version Control" atau "Git™ Version Control"

#### b. Create Repository
- Klik "Create"
- Repository Path: `public_html` (atau folder tujuan Anda)
- Repository URL: URL GitHub repository Anda
- Branch: `main` (atau branch yang ingin di-deploy)

#### c. Setup Deploy Key (jika repository private)
- Di GitHub, masuk ke Settings > Deploy keys
- Copy public key dari cPanel Git
- Tambahkan sebagai deploy key di GitHub

### 3. **Konfigurasi GitHub Webhook (Optional)**
- Di GitHub repository, masuk ke Settings > Webhooks
- Add webhook dengan URL yang disediakan cPanel
- Content type: `application/json`
- Event: `Just the push event`

### 4. **Setup Environment File**
Setelah deployment pertama:
- Login ke cPanel File Manager
- Navigate ke folder deployment Anda
- Copy `.env.example` menjadi `.env`
- Edit `.env` dengan konfigurasi database dan environment production:

```env
APP_NAME="Your App Name"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password

# Sesuaikan konfigurasi lainnya
```

### 5. **Setup Database**
- Buat database MySQL di cPanel
- Import/run migrations jika diperlukan
- Jalankan seeder jika ada

### 6. **Set Document Root (Penting untuk Laravel)**
Di cPanel:
- Masuk ke "Subdomains" atau "Addon Domains"
- Set document root ke: `/home/username/public_html/public`
- Atau buat symlink dari public_html ke folder public Laravel

### 7. **Test Deployment**
- Push perubahan ke GitHub
- Check di cPanel Git apakah auto-pull berjalan
- Akses website untuk memastikan deployment berhasil

## File yang Akan Di-Deploy

File `.cpanel.yml` akan mengcopy semua file penting Laravel:
- `app/` - Aplikasi Laravel
- `bootstrap/` - Bootstrap files
- `config/` - Konfigurasi
- `database/` - Database migrations, seeders
- `public/` - Public assets
- `resources/` - Views, assets
- `routes/` - Route definitions
- `storage/` - Storage files
- `vendor/` - Dependencies
- `api/` - API files (untuk Vercel)

## Troubleshooting

### Error Permission
Jika ada error permission:
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### Error Composer
Jika server tidak memiliki Composer, uncomment baris composer di `.cpanel.yml` atau upload folder `vendor/` manual.

### Error Storage Link
Jalankan manual di terminal cPanel:
```bash
php artisan storage:link
```

### Error Environment
Pastikan file `.env` sudah dibuat dan dikonfigurasi dengan benar.

## Tips Optimasi

1. **Caching**: Setelah deployment, jalankan:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

2. **Composer Optimization**:
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

3. **Asset Compilation**: Jika menggunakan Vite/Mix, compile assets sebelum push:
   ```bash
   npm run build
   ```

## Catatan Penting

- Ganti `your-username` di file `.cpanel.yml` dengan username cPanel Anda
- Pastikan database sudah dikonfigurasi dengan benar
- Set APP_ENV=production dan APP_DEBUG=false untuk production
- Backup data sebelum deployment pertama
- Test di staging environment terlebih dahulu jika memungkinkan
