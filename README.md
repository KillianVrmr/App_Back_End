# Structuur

Welcome to **Structuur**, a Laravel based app to streamline your personnel planning for project management.

---

## running the app

### 1. Clone the repository
```bash
git clone https://github.com/KillianVrmr/App_Back_End.git
cd App_Back_End
```

### 2. Install the dependencies
```bash
composer install
npm install
```

### 3. Copy and configure the environment-variables
```bash
cp .env.example .env
```
Add the following to your .env to configure the chat
```
BROADCAST_CONNECTION=reverb
BROADCAST_DRIVER=reverb

REVERB_APP_ID=898073
REVERB_APP_KEY=ejqqmqighfkpzjg3rpmp
REVERB_APP_SECRET=wyn03duy7wkjdpchztyu
REVERB_HOST="localhost"
REVERB_PORT=8080
REVERB_SCHEME=http

VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="${REVERB_HOST}"
VITE_REVERB_PORT="${REVERB_PORT}"
VITE_REVERB_SCHEME="${REVERB_SCHEME}"
```

### 4. Generate an application key
```bash
php artisan key:generate
```

### 5. Migrate and seed the database
```bash
php artisan migrate --seed
```
### 6. Make sure your public/storage points to storage/app/public
```bash
php artisan storage:link
```
### 6. Run the app
The bottom two commands are only necessary when using the chat function as well.
```bash
composer run dev
php artisan reverb:start --host=127.0.0.1 --port=8080
php artisan queue:work

```
