kicks-app-wordpress
===================

> Wordpress development stack

## Development

Download [Docker CE](https://www.docker.com/get-docker) for your OS.

### Environment

Point terminal to your project root and start up the container.

```cli
docker-compose up -d
```

Open your browser at [http://localhost:8000](http://localhost:8000).

Go through Wordpress installation and activate the demo theme.

### Useful commands

#### Startup services

```cli
docker-compose up -d
```
You may omit the `-d`-flag for verbose output.

#### Shutdown services

In order to shutdown services, issue the following command

```cli
docker-compose down
```

#### List containers

```cli
docker-compose ps
```

#### Remove containers

```cli
docker-compose rm
```

#### Open bash

Open bash at wordpress directory

```cli
docker-compose exec wordpress bash
```

#### Update composer dependencies

If it's complaining about the composer.lock file, you probably need to update the dependencies.

```cli
docker-compose run composer update
```

###### List all globally running docker containers

```cli
docker ps
```

###### Globally stop all running docker containers

```cli
docker stop $(docker ps -a -q)
```

###### Globally remove all containers

```cli
docker rm $(docker ps -a -q)
```

##### Remove all docker related stuff

```cli
docker system prune
```


## Theme development

Point your terminal at your theme directory

```
cd wp-content/themes/kicks-app
```

### Install

In order to build front-end assets you need to first install [nodejs](https://nodejs.org/en/).

From theme directory in `wp-content/themes/kicks-app` install client dependencies

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
