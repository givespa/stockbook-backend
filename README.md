# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible, and secure. 
More information can be found at the [official site](http://codeigniter.com).

This repository holds the distributable version of the framework,
including the user guide. It has been built from the 
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/). 

# StockBook

Nombre que se le dio al Backend para la prueba de la vacante de programador full-stack.

# Install.

- Crear base de datos de nombre `stockbook`.

- Clonar o colocar el proyecto en su carpeta `localhost`, la carpeta debe tener como nombre `stockbook`.

- Abra su terminarl y ejecute la migración, Codigo: `php spark migrate`. 

# API.

## API Host

https://localhost/

## Book

- Show. METHOD get

    URL: /Stockbook/public/api/book/show?id=2
    
    Para mostrar los registros recibe como parámetro: `id` id del registro del libro.

- Create. METHOD post

    URL: /Stockbook/public/api/book/create
    
    Para crear un registros recibe los siguientes parámetro: `name :string` nombre del libro, `author :string` nombre del autor del libro, `editorial :string` nombre de la editorial del libro, `year :date` año de publicación, `synopsis :string` sinopsis del libro.

- Update. METHOD post

    URL: /Stockbook/public/api/book/update

    Para actualizar un registro debe pasar el siguiente parámetro: ('id') id del libro,
    y puede utilizar cualquiera de estos parámetros: `name :string` nombre del libro, `author :string` nombre del autor del libro, `editorial :string` nombre de la editorial del libro, `year :date` año de publicación, `synopsis :string` sinopsis del libro.

- Delete. METHOD post

    URL: /Stockbook/public/api/book/delete

    Para eliminar un registro recibe como parámetros: ('id') id del libro.