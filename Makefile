up:
	./vendor/bin/sail up -d
stop:
	./vendor/bin/sail down
dev:
	./vendor/bin/sail npm run dev
migrate:
	./vendor/bin/sail artisan migrate
seed:
	./vendor/bin/sail artisan db:seed
