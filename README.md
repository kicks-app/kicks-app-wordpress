kicks-app-wordpress
===================

> Wordpress development stack

# Development

## Setup

Install docker for [Mac OS X](https://store.docker.com/editions/community/docker-ce-desktop-mac) or [Windows](https://store.docker.com/editions/community/docker-ce-desktop-windows)

### Run server

Open a terminal at the project directory and start services

```cli
docker-compose up -d
```

Wordpress should now be available on `localhost:8000`

### Useful docker commands

List all running docker services

```cli
docker ps
```

Shutdown services

```cli
docker-compose down
```

Update composer dependencies

```cli
docker-compose run --rm composer update
```

Open bash at the wordpress container

```cli
docker exec -it wordpress bash
```

Global

[One liner](https://coderwall.com/p/ewk0mq/stop-remove-all-docker-containers) to stop / remove all of Docker containers

```cli
docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)
```

## Theme development

### Install
In order to build front-end assets you need to first install [nodejs](https://nodejs.org/en/).

From theme directory in `wp-content/themes/[project]` install client dependencies

```cli
npm install
```

### Build

Trigger a webpack build

```cli
npm run build
```

### Watch

Run webpack in watch mode

```cli
npm run watch
```
