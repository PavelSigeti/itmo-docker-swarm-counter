# Docker-compose.yml 
Задаем образ для реплик

    image: 127.0.0.1:5000/docker_swarm/php

Устанавливаем ноды

    deploy:
        mode: replicated
        replicas: 4

# Docker swarm
Инициализация роя

    $ docker swarm init

Запуск регистра, как сервиса

    $ docker service create --name registry --publish published=5000,target=5000 registry:2

Проверим, что образы работают

    $ docker-compose up -d
    $ curl http://localhost:8000
    $ docker-compose down -v

Пушим образы в регистр

    $ docker-compose push

Деплоим приложение

    $ docker stack deploy --compose-file docker-compose.yml docker_swarm

    $ curl http://localhost:8000

Удаление

    $ docker stack rm docker_swarm
    $ docker service rm registry
    $ docker swarm leave --force
