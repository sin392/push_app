deploy:
	docker buildx build -f php/Dockerfile . --platform linux/amd64 -t push_app_web:heroku
	docker tag push_app_web:heroku registry.heroku.com/push-app0/web
	docker push registry.heroku.com/push-app0/web
	heroku container:release web