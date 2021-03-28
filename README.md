# AIVO - Spotify Challenge

  - [Instalación](#instalacion)

  - [Tecnologias utilizadas](#Tecnologias)
  - [Back end](#back-end)

[Comentarios](#comentarios)


### Instalación

Clonarlo:

```
git clone https://github.com/sebdemaria/AIVO-Spotify
```

### Back end

Backend:

```
cd spotify
composer instal
php -S localhost:8000 -t public
(runnning at port 8000)
```
Para acceder al sitio usar http://localhost:8000/api/v1/albums?q= NOMBRE DE LA BANDA

## Tecnologias

### Back End
```
PHP 7.2, Lumen 7.0
```

# Comentarios

Se utilizo el HTTP Client de lumen para realizar las validaciones de HTTP STATUS CODE.
Se diseño el sitio con el patrón SERVICE-ADAPTER.
