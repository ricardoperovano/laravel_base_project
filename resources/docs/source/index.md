---
title: API Reference

language_tabs:
- php
- javascript
- python

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Autenticação


<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login
Esta rota provê um token, para ser utilizado em todas as outras requisições nesta api

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/api/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'quasi',
            'password' => 'et',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "quasi",
    "password": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/login'
payload = {
    "email": "quasi",
    "password": "et"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (200):

```json
{
    "success": true,
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5MzU0MzMwNSwiZXhwIjoxNTkzNTQ2OTA1LCJuYmYiOjE1OTM1NDMzMDUsImp0aSI6IkQ4UEpYcGoxOEhCZ0tpdHAiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJlbXByZXNhX2lkIjoxLCJuYW1lIjoiTHVpeiBSaWNhcmRvIFBlcm9244aderwiZW1haWwiOiJyaWNhcmRvQG1ldWx1Y3JvLmNvbS5iciJ9.TESvCwLN3GsFwEI7grN6013IMpNpVA0uJqipr4VdFH4"
}
```
> Example response (401):

```json
{
    "success": false,
    "errors": {
        "global": [
            "Invalid Email or Password"
        ]
    },
    "status": 401
}
```

### HTTP Request
`POST api/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | Email do usuário
        `password` | string |  required  | Senha do usuário
    
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## Logout
Esta rota adiciona o token do usuário na blacklist

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/api/logout',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/logout'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers)
response.json()
```


> Example response (200):

```json
{
    "success": true,
    "message": "User logged out successfully"
}
```
> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Token not provided | The token has been blacklisted",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

<!-- START_3fba263a38f92fde0e4e12f76067a611 -->
## Refresh Token
Esta rota atualiza o token do usuário

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/api/refresh',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/refresh'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers)
response.json()
```


> Example response (200):

```json
{
    "success": true,
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5MzU0MzMwNSwiZXhwIjoxNTkzNTQ2OTA1LCJuYmYiOjE1OTM1NDMzMDUsImp0aSI6IkQ4UEpYcGoxOEhCZ0tpdHAiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJlbXByZXNhX2lkIjoxLCJuYW1lIjoiTHVpeiBSaWNhcmRvIFBlcm9244aderwiZW1haWwiOiJyaWNhcmRvQG1ldWx1Y3JvLmNvbS5iciJ9.TESvCwLN3GsFwEI7grN6013IMpNpVA0uJqipr4VdFH4"
}
```
> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Token not provided | The token has been blacklisted",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`POST api/refresh`


<!-- END_3fba263a38f92fde0e4e12f76067a611 -->

#Empresa


<!-- START_895ba44a2fbbffdac9381f379a8ffea6 -->
## Listar
Lista de empresas cadastradas

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/api/empresa',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'query' => [
            'take'=> 'aperiam',
            'skip'=> 'tempore',
            'order'=> 'deleniti',
            'orderDirection'=> 'minima',
            'search'=> 'nam',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/empresa"
);

let params = {
    "take": "aperiam",
    "skip": "tempore",
    "order": "deleniti",
    "orderDirection": "minima",
    "search": "nam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/empresa'
params = {
  'take': 'aperiam',
  'skip': 'tempore',
  'order': 'deleniti',
  'orderDirection': 'minima',
  'search': 'nam',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`GET api/empresa`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `take` |  optional  | Quantidade de registros que será retornado Ex: 20
    `skip` |  optional  | Quantidade de registros para saltar Ex: 20
    `order` |  optional  | Nome do campo para ordenar Ex: nome
    `orderDirection` |  optional  | Direção da ordenação Ex: asc, desc
    `search` |  optional  | Texto para ser utilizado como pesquisa entre os registros

<!-- END_895ba44a2fbbffdac9381f379a8ffea6 -->

<!-- START_10ac35f4c173248f2a8143af4a26df89 -->
## Consultar
Esta rota consulta uma empresa específica

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/api/empresa/explicabo',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/empresa/explicabo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/empresa/explicabo'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`GET api/empresa/{empresa}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `empresa` |  required  | Id da empresa

<!-- END_10ac35f4c173248f2a8143af4a26df89 -->

<!-- START_a13c42c4d7b9a35e74b2f4e5bb72557a -->
## Adicionar
Esta rota cria uma nova empresa

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/api/empresa',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'nome' => 'suscipit',
            'cnpj' => 'eum',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/empresa"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "nome": "suscipit",
    "cnpj": "eum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/empresa'
payload = {
    "nome": "suscipit",
    "cnpj": "eum"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`POST api/empresa`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | Nome da Empresa
        `cnpj` | string |  required  | Cnpj
    
<!-- END_a13c42c4d7b9a35e74b2f4e5bb72557a -->

<!-- START_d1fe083067eeb03c77517557499dd044 -->
## Modificar
Esta rota faz alterações no cadastro da empresa

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost/api/empresa/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'nome' => 'quisquam',
            'cnpj' => 'ipsum',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/empresa/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "nome": "quisquam",
    "cnpj": "ipsum"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/empresa/1'
payload = {
    "nome": "quisquam",
    "cnpj": "ipsum"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`PUT api/empresa/{empresa}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | Nome da empresa
        `cnpj` | string |  optional  | Cnpj
    
<!-- END_d1fe083067eeb03c77517557499dd044 -->

<!-- START_d924f55b7261e247a092ada43d7110bc -->
## Excluir
Esta rota exclui a(s) empresa(s) passado como parâmetro {empresa} na url

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost/api/empresa/laboriosam',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/empresa/laboriosam"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/empresa/laboriosam'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`DELETE api/empresa/{empresa}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `empresa` |  required  | Ids que serão excluídos separados por virgula Ex: 1,20,55

<!-- END_d924f55b7261e247a092ada43d7110bc -->

#Empresa Usuário


<!-- START_31cdfe44e8615c8353eeca15d3f8a91b -->
## Listar
Lista de usuários e suas empresas

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/api/usuario-empresa',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'query' => [
            'take'=> 'voluptatem',
            'skip'=> 'quia',
            'order'=> 'nemo',
            'orderDirection'=> 'quia',
            'search'=> 'voluptate',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/usuario-empresa"
);

let params = {
    "take": "voluptatem",
    "skip": "quia",
    "order": "nemo",
    "orderDirection": "quia",
    "search": "voluptate",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/usuario-empresa'
params = {
  'take': 'voluptatem',
  'skip': 'quia',
  'order': 'nemo',
  'orderDirection': 'quia',
  'search': 'voluptate',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`GET api/usuario-empresa`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `take` |  optional  | Quantidade de registros que será retornado Ex: 20
    `skip` |  optional  | Quantidade de registros para saltar Ex: 20
    `order` |  optional  | Nome do campo para ordenar Ex: nome
    `orderDirection` |  optional  | Direção da ordenação Ex: asc, desc
    `search` |  optional  | Texto para ser utilizado como pesquisa entre os registros

<!-- END_31cdfe44e8615c8353eeca15d3f8a91b -->

<!-- START_932c480e1f79712ec9981be7ce5ccaad -->
## Consultar
Esta rota consulta um usuário em uma empresa

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/api/usuario-empresa/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/usuario-empresa/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/usuario-empresa/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`GET api/usuario-empresa/{usuarioEmpresa}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `empresaUsuario` |  required  | Id da empresa de usuário

<!-- END_932c480e1f79712ec9981be7ce5ccaad -->

<!-- START_1b8139122259de5574ba67a3888a71b1 -->
## Adicionar
Esta rota adiciona um usuário à uma empresa

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/api/usuario-empresa',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'idUsuario' => 4,
            'idEmpresa' => 8,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/usuario-empresa"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "idUsuario": 4,
    "idEmpresa": 8
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/usuario-empresa'
payload = {
    "idUsuario": 4,
    "idEmpresa": 8
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`POST api/usuario-empresa`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `idUsuario` | integer |  required  | Id do Usuário
        `idEmpresa` | integer |  required  | Id da Empresa
    
<!-- END_1b8139122259de5574ba67a3888a71b1 -->

<!-- START_2162d989d1826e3bb106cada2ff123fb -->
## Modificar
Esta rota faz alterações no usuário de uma empresa

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost/api/usuario-empresa/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'ativo' => false,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/usuario-empresa/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "ativo": false
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/usuario-empresa/1'
payload = {
    "ativo": false
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```


> Example response (404):

```json
{
    "error": true,
    "title": "Registro não encontrado",
    "message": "No query results for model [App\\Models\\UsuarioEmpresa] 1",
    "status": 404,
    "response_code": 404
}
```

### HTTP Request
`PUT api/usuario-empresa/{usuarioEmpresa}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `ativo` | boolean |  required  | Usuário está ativo na empresa
    
<!-- END_2162d989d1826e3bb106cada2ff123fb -->

<!-- START_1705a7b29c4ff27a34c463222633fb35 -->
## Excluir
Esta rota exclui um usuário de uma empresa

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost/api/usuario-empresa/doloribus',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/usuario-empresa/doloribus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/usuario-empresa/doloribus'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`DELETE api/usuario-empresa/{usuarioEmpresa}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `usuarioEmpresa` |  required  | Ids que serão excluídos separados por virgula Ex: 1,20,55

<!-- END_1705a7b29c4ff27a34c463222633fb35 -->

#Log


<!-- START_0f7f41d33f1e304a878e4ac122458615 -->
## Listar
Lista de logs

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/api/log',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'query' => [
            'take'=> 'earum',
            'skip'=> 'veritatis',
            'order'=> 'sed',
            'orderDirection'=> 'dolores',
            'search'=> 'facere',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/log"
);

let params = {
    "take": "earum",
    "skip": "veritatis",
    "order": "sed",
    "orderDirection": "dolores",
    "search": "facere",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/log'
params = {
  'take': 'earum',
  'skip': 'veritatis',
  'order': 'sed',
  'orderDirection': 'dolores',
  'search': 'facere',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`GET api/log`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `take` |  optional  | Quantidade de registros que será retornado Ex: 20
    `skip` |  optional  | Quantidade de registros para saltar Ex: 20
    `order` |  optional  | Nome do campo para ordenar Ex: nome
    `orderDirection` |  optional  | Direção da ordenação Ex: asc, desc
    `search` |  optional  | Texto para ser utilizado como pesquisa entre os registros

<!-- END_0f7f41d33f1e304a878e4ac122458615 -->

<!-- START_57d698c5493ecc50a191a7a41d68ee9c -->
## Consultar
Esta rota retorna um log especifico

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/api/log/et',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/log/et"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/log/et'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`GET api/log/{log}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `log` |  required  | Id do log

<!-- END_57d698c5493ecc50a191a7a41d68ee9c -->

<!-- START_b633fffdebb9e331cbeb42dac7a46995 -->
## Adicionar
Esta rota cria um novo log.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/api/log',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'acao' => 16,
            'classe' => 'ab',
            'objeto_original' => 'adipisci',
            'objeto_modificado' => 'et',
            'data' => 'dolores',
            'model_id' => 'quam',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/log"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "acao": 16,
    "classe": "ab",
    "objeto_original": "adipisci",
    "objeto_modificado": "et",
    "data": "dolores",
    "model_id": "quam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/log'
payload = {
    "acao": 16,
    "classe": "ab",
    "objeto_original": "adipisci",
    "objeto_modificado": "et",
    "data": "dolores",
    "model_id": "quam"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`POST api/log`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `acao` | integer |  required  | Ação que foi executada Ex:  [ 'Excluir' => 1, 'Incluir' => 2, 'AtribuirPerfil' => 3, 'Alterar' => 4, 'AtribuirPermissão' => 5, 'RemoverPermissão' => 6, 'Entrou' => 7, 'LoginFalhou' => 8, 'Importar' => 9]
        `classe` | string |  required  | Nome do usuário
        `objeto_original` | string |  required  | Nome do usuário
        `objeto_modificado` | string |  required  | Nome do usuário
        `data` | string |  required  | Nome do usuário
        `model_id` | string |  required  | Nome do usuário
    
<!-- END_b633fffdebb9e331cbeb42dac7a46995 -->

#Usuário


<!-- START_2b6e5a4b188cb183c7e59558cce36cb6 -->
## Listar
Lista de usuários cadastrados

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/api/user',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'query' => [
            'take'=> 'similique',
            'skip'=> 'aliquid',
            'order'=> 'dicta',
            'orderDirection'=> 'corrupti',
            'search'=> 'mollitia',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/user"
);

let params = {
    "take": "similique",
    "skip": "aliquid",
    "order": "dicta",
    "orderDirection": "corrupti",
    "search": "mollitia",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/user'
params = {
  'take': 'similique',
  'skip': 'aliquid',
  'order': 'dicta',
  'orderDirection': 'corrupti',
  'search': 'mollitia',
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`GET api/user`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `take` |  optional  | Quantidade de registros que será retornado Ex: 20
    `skip` |  optional  | Quantidade de registros para saltar Ex: 20
    `order` |  optional  | Nome do campo para ordenar Ex: nome
    `orderDirection` |  optional  | Direção da ordenação Ex: asc, desc
    `search` |  optional  | Texto para ser utilizado como pesquisa entre os registros

<!-- END_2b6e5a4b188cb183c7e59558cce36cb6 -->

<!-- START_ceec0e0b1d13d731ad96603d26bccc2f -->
## Consultar
Esta rota retorna um usuário especifico

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/api/user/est',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/user/est"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/user/est'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`GET api/user/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user` |  required  | Id do usuário

<!-- END_ceec0e0b1d13d731ad96603d26bccc2f -->

<!-- START_f0654d3f2fc63c11f5723f233cc53c83 -->
## Adicionar
Esta rota cria um novo usuário

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost/api/user',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'nome' => 'et',
            'senha' => 'in',
            'confirmacao_senha' => 'nisi',
            'email' => 'ut',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "nome": "et",
    "senha": "in",
    "confirmacao_senha": "nisi",
    "email": "ut"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/user'
payload = {
    "nome": "et",
    "senha": "in",
    "confirmacao_senha": "nisi",
    "email": "ut"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`POST api/user`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | Nome do usuário
        `senha` | string |  required  | Senha
        `confirmacao_senha` | string |  required  | Confirmação de Senha
        `email` | string |  required  | Email
    
<!-- END_f0654d3f2fc63c11f5723f233cc53c83 -->

<!-- START_1857d3df71d357b05fb022b3b344cf91 -->
## Modificar
Esta rota faz alterações no cadastro do usuário

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost/api/user/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'nome' => 'autem',
            'senha' => 'voluptatem',
            'confirmacao_senha' => 'nulla',
            'email' => 'molestiae',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "nome": "autem",
    "senha": "voluptatem",
    "confirmacao_senha": "nulla",
    "email": "molestiae"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/user/1'
payload = {
    "nome": "autem",
    "senha": "voluptatem",
    "confirmacao_senha": "nulla",
    "email": "molestiae"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`PUT api/user/{user}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | Nome do usuário
        `senha` | string |  optional  | Senha
        `confirmacao_senha` | string |  optional  | Confirmação de Senha
        `email` | string |  required  | Email
    
<!-- END_1857d3df71d357b05fb022b3b344cf91 -->

<!-- START_4bb7fb4a7501d3cb1ed21acfc3b205a9 -->
## Excluir
Esta rota exclui o(s) usuário(s) passado como parâmetro {user} na url

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost/api/user/tempore',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```javascript
const url = new URL(
    "http://localhost/api/user/tempore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```python
import requests
import json

url = 'http://localhost/api/user/tempore'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}
```

### HTTP Request
`DELETE api/user/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user` |  required  | Ids que serão excluídos separados por virgula Ex: 1,20,55

<!-- END_4bb7fb4a7501d3cb1ed21acfc3b205a9 -->


