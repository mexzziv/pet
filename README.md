### Proyecto

La API esta desarrollada en Laravel en su versión 7x, utilizando MySQL como gestor de Base de Datos.

Para su instalación puede clonar el repositorio en https://github.com/mexzziv/pet o con el comando

```
composer required mexzziv/PetAPI
```

Cuando termine la imputación modifica el nombre del archivo .env.example a .env para que el proyecto detecte las variables de entorno.

### Inicializar proyecto

Para la integración de tu base de datos modifica el archivo .env en las siguientes lineas:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Crear la tabla en la base de datos con el siguiente comando

```php
php artisan migrate
```

Ejecutar el seeder para el llenado de la base de datos

```php
php artisan db:seed --class=PetSeeder
```

Si se desea modificar los datos a llenar ingresa al archivo database/seeds/PetSeeder.php

```php
class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ...
    }
}

```

### Gestión de la API

Existes 3 rutas las cuales son:

```
v1/pets/
v1/pets/create
v1/pets/{id}
```

##### GET -> v1/pets/

La ruta devuelve los registros de la Base de datos limitados a 100 registros

Vista de respuesta

```json
[
  {
    "id": 1,
    "name": "kFIu4",
    "tag": "dF5Vf"
  },
  {
    "id": 2,
    "name": "aPY3I",
    "tag": "fEWAH"
  },
  {
    "id": 3,
    "name": "36bwx",
    "tag": "Mo9dC"
  },
  {
    "id": 4,
    "name": "vEXzK",
    "tag": "xHpca"
  },
  {
    "id": 5,
    "name": "BSyBl",
    "tag": "eSodR"
  },
  {
    "id": 6,
    "name": "t6JWu",
    "tag": "iLFFh"
  },
  {
    "id": 7,
    "name": "Rl2Wp",
    "tag": "4ClMK"
  },
  {
    "id": 8,
    "name": "at8JK",
    "tag": "UJUVW"
  },
  {
    "id": 9,
    "name": "DLQmn",
    "tag": "z4NO5"
  },
  {
    "id": 10,
    "name": "SlXvq",
    "tag": "RzvBW"
  },
  {
    "id": 11,
    "name": "ytnVK",
    "tag": "cww9Y"
  },
  {
    "id": 12,
    "name": "Firus",
    "tag": "Perro"
  },
  {
    "id": 13,
    "name": "Don Gato",
    "tag": "Gato"
  },
  {
    "id": 14,
    "name": "Cerebro",
    "tag": "Raton"
  },
  {
    "id": 15,
    "name": "Piolin",
    "tag": "Canario"
  },
  {
    "id": 16,
    "name": "Dino",
    "tag": "Dinosuario"
  }
]
```

##### POST -> v1/pets/

El enponit realizar el registro en la base de datos necesita como parametro el name dentro de la peticion POST, si el registro es exitoso da el siguiente resultado:

```
{
    "code": 200,
    "status": "Create a pet",
    "response": {
        "name": "Mono",
        "tag": "pets",
        "updated_at": "2021-04-30T18:49:17.000000Z",
        "created_at": "2021-04-30T18:49:17.000000Z",
        "id": 17
    }
}
```

Si dentro de petición hace falta el parámetro name dará como respuesta el siguiente mensaje

```json
{
  "code": 2,
  "status": "Validated fail",
  "response": {
    "name": ["The name field is required."]
  }
}
```

Si ocurre un durante el proceso se manda el siguiente mensaje

```json
{
  "code": 3,
  "status": "error",
  "response": null
}
```

##### GET -> v1/pets/{id}

El endpoint para la búsqueda de un registro para el id solo necesita como parámetro el id a buscar, dando como resultado el siguiente mensaje si hubo una coincidencia:

```json
{
  "code": 200,
  "status": "Pet find by id: 3",
  "response": {
    "id": 3,
    "name": "36bwx",
    "tag": "Mo9dC",
    "created_at": null,
    "updated_at": null
  }
}
```

Si la búsqueda no da un resultado dará el siguiente mensaje:

```json
{
  "code": 404,
  "status": "Pet not found",
  "response": null
}
```

### Postman

Para hacer pruebas de los endpoints se puede utilizar el siguiente codigo

```
{
	"info": {
		"_postman_id": "e410fa68-8a50-4482-be07-a0116e40086f",
		"name": "Pets API",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
	},
	"item": [
		{
			"name": "http://tu_url_va_aqui/api/v1/pets/{id}",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "http://tu_url_va_aqui/api/v1/pets/{id}",
					"protocol": "http",
					"host": [
						"develop",
						"aktivamas",
						"com"
					],
					"path": [
						"api",
						"v1",
						"pets",
						"3"
					]
				},
				"description": "Get pet by ID"
			},
			"response": []
		},
		{
			"name": "http://tu_url_va_aqui/api/v1/pets",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "http://tu_url_va_aqui/api/v1/pets",
					"protocol": "http",
					"host": [
						"develop",
						"aktivamas",
						"com"
					],
					"path": [
						"api",
						"v1",
						"pets"
					]
				},
				"description": "Get all pets"
			},
			"response": []
		},
		{
			"name": "http://tu_url_va_aqui/api/v1/pets/create?name=Mono",
			"request": {
				"method": "POST",
				"header": [],
				"url": {
					"raw": "http://tu_url_va_aqui/api/v1/pets/create?name=Mono",
					"protocol": "http",
					"host": [
						"develop",
						"aktivamas",
						"com"
					],
					"path": [
						"api",
						"v1",
						"pets",
						"create"
					],
					"query": [
						{
							"key": "name",
							"value": "Mono"
						}
					]
				},
				"description": "Create pet in a API"
			},
			"response": []
		}
	]
}
```
