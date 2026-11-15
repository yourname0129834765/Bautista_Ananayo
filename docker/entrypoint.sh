
#!/bin/sh
set -eu

cd /var/www/html

case "${DB_CONNECTION:-}" in
    mysql|pgsql)
        echo "Waiting for the database connection..."

        attempt=0

        until php artisan migrate --force --no-interaction; do
            attempt=$((attempt + 1))

            if [ "$attempt" -ge 10 ]; then
                echo "Database migrations failed after $attempt attempts." >&2
                exit 1
            fi

            echo "Database not ready; retrying in 3 seconds ($attempt/10)..."
            sleep 3
        done
        ;;
    *)
        echo "Skipping automatic migrations for DB_CONNECTION=${DB_CONNECTION:-unset}"
        ;;
esac

php artisan config:cache
php artisan view:cache

exec "$@"