<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["php","javascript","python"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="php">php</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                                  <a href="#" data-language-name="python">python</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ route("apidoc.json") }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>Autenticação</h1>
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
<h2>Login</h2>
<p>Esta rota provê um token, para ser utilizado em todas as outras requisições nesta api</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/login',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'quasi',
            'password' =&gt; 'et',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5MzU0MzMwNSwiZXhwIjoxNTkzNTQ2OTA1LCJuYmYiOjE1OTM1NDMzMDUsImp0aSI6IkQ4UEpYcGoxOEhCZ0tpdHAiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJlbXByZXNhX2lkIjoxLCJuYW1lIjoiTHVpeiBSaWNhcmRvIFBlcm9244aderwiZW1haWwiOiJyaWNhcmRvQG1ldWx1Y3JvLmNvbS5iciJ9.TESvCwLN3GsFwEI7grN6013IMpNpVA0uJqipr4VdFH4"
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "errors": {
        "global": [
            "Invalid Email or Password"
        ]
    },
    "status": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>required</td>
<td>Email do usuário</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>Senha do usuário</td>
</tr>
</tbody>
</table>
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->
<!-- START_61739f3220a224b34228600649230ad1 -->
<h2>Logout</h2>
<p>Esta rota adiciona o token do usuário na blacklist</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/logout',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost/api/logout'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "User logged out successfully"
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Token not provided | The token has been blacklisted",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/logout</code></p>
<!-- END_61739f3220a224b34228600649230ad1 -->
<!-- START_3fba263a38f92fde0e4e12f76067a611 -->
<h2>Refresh Token</h2>
<p>Esta rota atualiza o token do usuário</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/refresh',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost/api/refresh'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5MzU0MzMwNSwiZXhwIjoxNTkzNTQ2OTA1LCJuYmYiOjE1OTM1NDMzMDUsImp0aSI6IkQ4UEpYcGoxOEhCZ0tpdHAiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJlbXByZXNhX2lkIjoxLCJuYW1lIjoiTHVpeiBSaWNhcmRvIFBlcm9244aderwiZW1haWwiOiJyaWNhcmRvQG1ldWx1Y3JvLmNvbS5iciJ9.TESvCwLN3GsFwEI7grN6013IMpNpVA0uJqipr4VdFH4"
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Token not provided | The token has been blacklisted",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/refresh</code></p>
<!-- END_3fba263a38f92fde0e4e12f76067a611 -->
<h1>Empresa</h1>
<!-- START_895ba44a2fbbffdac9381f379a8ffea6 -->
<h2>Listar</h2>
<p>Lista de empresas cadastradas</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/empresa',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'query' =&gt; [
            'take'=&gt; 'aperiam',
            'skip'=&gt; 'tempore',
            'order'=&gt; 'deleniti',
            'orderDirection'=&gt; 'minima',
            'search'=&gt; 'nam',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/empresa</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>take</code></td>
<td>optional</td>
<td>Quantidade de registros que será retornado Ex: 20</td>
</tr>
<tr>
<td><code>skip</code></td>
<td>optional</td>
<td>Quantidade de registros para saltar Ex: 20</td>
</tr>
<tr>
<td><code>order</code></td>
<td>optional</td>
<td>Nome do campo para ordenar Ex: nome</td>
</tr>
<tr>
<td><code>orderDirection</code></td>
<td>optional</td>
<td>Direção da ordenação Ex: asc, desc</td>
</tr>
<tr>
<td><code>search</code></td>
<td>optional</td>
<td>Texto para ser utilizado como pesquisa entre os registros</td>
</tr>
</tbody>
</table>
<!-- END_895ba44a2fbbffdac9381f379a8ffea6 -->
<!-- START_10ac35f4c173248f2a8143af4a26df89 -->
<h2>Consultar</h2>
<p>Esta rota consulta uma empresa específica</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/empresa/explicabo',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost/api/empresa/explicabo'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/empresa/{empresa}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>empresa</code></td>
<td>required</td>
<td>Id da empresa</td>
</tr>
</tbody>
</table>
<!-- END_10ac35f4c173248f2a8143af4a26df89 -->
<!-- START_a13c42c4d7b9a35e74b2f4e5bb72557a -->
<h2>Adicionar</h2>
<p>Esta rota cria uma nova empresa</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/empresa',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'json' =&gt; [
            'nome' =&gt; 'suscipit',
            'cnpj' =&gt; 'eum',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/empresa</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>nome</code></td>
<td>string</td>
<td>required</td>
<td>Nome da Empresa</td>
</tr>
<tr>
<td><code>cnpj</code></td>
<td>string</td>
<td>required</td>
<td>Cnpj</td>
</tr>
</tbody>
</table>
<!-- END_a13c42c4d7b9a35e74b2f4e5bb72557a -->
<!-- START_d1fe083067eeb03c77517557499dd044 -->
<h2>Modificar</h2>
<p>Esta rota faz alterações no cadastro da empresa</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost/api/empresa/1',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'json' =&gt; [
            'nome' =&gt; 'quisquam',
            'cnpj' =&gt; 'ipsum',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/empresa/{empresa}</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>nome</code></td>
<td>string</td>
<td>required</td>
<td>Nome da empresa</td>
</tr>
<tr>
<td><code>cnpj</code></td>
<td>string</td>
<td>optional</td>
<td>Cnpj</td>
</tr>
</tbody>
</table>
<!-- END_d1fe083067eeb03c77517557499dd044 -->
<!-- START_d924f55b7261e247a092ada43d7110bc -->
<h2>Excluir</h2>
<p>Esta rota exclui a(s) empresa(s) passado como parâmetro {empresa} na url</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost/api/empresa/laboriosam',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost/api/empresa/laboriosam'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/empresa/{empresa}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>empresa</code></td>
<td>required</td>
<td>Ids que serão excluídos separados por virgula Ex: 1,20,55</td>
</tr>
</tbody>
</table>
<!-- END_d924f55b7261e247a092ada43d7110bc -->
<h1>Empresa Usuário</h1>
<!-- START_31cdfe44e8615c8353eeca15d3f8a91b -->
<h2>Listar</h2>
<p>Lista de usuários e suas empresas</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/usuario-empresa',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'query' =&gt; [
            'take'=&gt; 'voluptatem',
            'skip'=&gt; 'quia',
            'order'=&gt; 'nemo',
            'orderDirection'=&gt; 'quia',
            'search'=&gt; 'voluptate',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/usuario-empresa</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>take</code></td>
<td>optional</td>
<td>Quantidade de registros que será retornado Ex: 20</td>
</tr>
<tr>
<td><code>skip</code></td>
<td>optional</td>
<td>Quantidade de registros para saltar Ex: 20</td>
</tr>
<tr>
<td><code>order</code></td>
<td>optional</td>
<td>Nome do campo para ordenar Ex: nome</td>
</tr>
<tr>
<td><code>orderDirection</code></td>
<td>optional</td>
<td>Direção da ordenação Ex: asc, desc</td>
</tr>
<tr>
<td><code>search</code></td>
<td>optional</td>
<td>Texto para ser utilizado como pesquisa entre os registros</td>
</tr>
</tbody>
</table>
<!-- END_31cdfe44e8615c8353eeca15d3f8a91b -->
<!-- START_932c480e1f79712ec9981be7ce5ccaad -->
<h2>Consultar</h2>
<p>Esta rota consulta um usuário em uma empresa</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/usuario-empresa/1',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost/api/usuario-empresa/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/usuario-empresa/{usuarioEmpresa}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>empresaUsuario</code></td>
<td>required</td>
<td>Id da empresa de usuário</td>
</tr>
</tbody>
</table>
<!-- END_932c480e1f79712ec9981be7ce5ccaad -->
<!-- START_1b8139122259de5574ba67a3888a71b1 -->
<h2>Adicionar</h2>
<p>Esta rota adiciona um usuário à uma empresa</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/usuario-empresa',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'json' =&gt; [
            'idUsuario' =&gt; 4,
            'idEmpresa' =&gt; 8,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/usuario-empresa</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>idUsuario</code></td>
<td>integer</td>
<td>required</td>
<td>Id do Usuário</td>
</tr>
<tr>
<td><code>idEmpresa</code></td>
<td>integer</td>
<td>required</td>
<td>Id da Empresa</td>
</tr>
</tbody>
</table>
<!-- END_1b8139122259de5574ba67a3888a71b1 -->
<!-- START_2162d989d1826e3bb106cada2ff123fb -->
<h2>Modificar</h2>
<p>Esta rota faz alterações no usuário de uma empresa</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost/api/usuario-empresa/1',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'json' =&gt; [
            'ativo' =&gt; false,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Registro não encontrado",
    "message": "No query results for model [App\\Models\\UsuarioEmpresa] 1",
    "status": 404,
    "response_code": 404
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/usuario-empresa/{usuarioEmpresa}</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>ativo</code></td>
<td>boolean</td>
<td>required</td>
<td>Usuário está ativo na empresa</td>
</tr>
</tbody>
</table>
<!-- END_2162d989d1826e3bb106cada2ff123fb -->
<!-- START_1705a7b29c4ff27a34c463222633fb35 -->
<h2>Excluir</h2>
<p>Esta rota exclui um usuário de uma empresa</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost/api/usuario-empresa/doloribus',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost/api/usuario-empresa/doloribus'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/usuario-empresa/{usuarioEmpresa}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>usuarioEmpresa</code></td>
<td>required</td>
<td>Ids que serão excluídos separados por virgula Ex: 1,20,55</td>
</tr>
</tbody>
</table>
<!-- END_1705a7b29c4ff27a34c463222633fb35 -->
<h1>Log</h1>
<!-- START_0f7f41d33f1e304a878e4ac122458615 -->
<h2>Listar</h2>
<p>Lista de logs</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/log',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'query' =&gt; [
            'take'=&gt; 'earum',
            'skip'=&gt; 'veritatis',
            'order'=&gt; 'sed',
            'orderDirection'=&gt; 'dolores',
            'search'=&gt; 'facere',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/log</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>take</code></td>
<td>optional</td>
<td>Quantidade de registros que será retornado Ex: 20</td>
</tr>
<tr>
<td><code>skip</code></td>
<td>optional</td>
<td>Quantidade de registros para saltar Ex: 20</td>
</tr>
<tr>
<td><code>order</code></td>
<td>optional</td>
<td>Nome do campo para ordenar Ex: nome</td>
</tr>
<tr>
<td><code>orderDirection</code></td>
<td>optional</td>
<td>Direção da ordenação Ex: asc, desc</td>
</tr>
<tr>
<td><code>search</code></td>
<td>optional</td>
<td>Texto para ser utilizado como pesquisa entre os registros</td>
</tr>
</tbody>
</table>
<!-- END_0f7f41d33f1e304a878e4ac122458615 -->
<!-- START_57d698c5493ecc50a191a7a41d68ee9c -->
<h2>Consultar</h2>
<p>Esta rota retorna um log especifico</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/log/et',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost/api/log/et'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/log/{log}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>log</code></td>
<td>required</td>
<td>Id do log</td>
</tr>
</tbody>
</table>
<!-- END_57d698c5493ecc50a191a7a41d68ee9c -->
<!-- START_b633fffdebb9e331cbeb42dac7a46995 -->
<h2>Adicionar</h2>
<p>Esta rota cria um novo log.</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/log',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'json' =&gt; [
            'acao' =&gt; 16,
            'classe' =&gt; 'ab',
            'objeto_original' =&gt; 'adipisci',
            'objeto_modificado' =&gt; 'et',
            'data' =&gt; 'dolores',
            'model_id' =&gt; 'quam',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/log</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>acao</code></td>
<td>integer</td>
<td>required</td>
<td>Ação que foi executada Ex:  [ 'Excluir' =&gt; 1, 'Incluir' =&gt; 2, 'AtribuirPerfil' =&gt; 3, 'Alterar' =&gt; 4, 'AtribuirPermissão' =&gt; 5, 'RemoverPermissão' =&gt; 6, 'Entrou' =&gt; 7, 'LoginFalhou' =&gt; 8, 'Importar' =&gt; 9]</td>
</tr>
<tr>
<td><code>classe</code></td>
<td>string</td>
<td>required</td>
<td>Nome do usuário</td>
</tr>
<tr>
<td><code>objeto_original</code></td>
<td>string</td>
<td>required</td>
<td>Nome do usuário</td>
</tr>
<tr>
<td><code>objeto_modificado</code></td>
<td>string</td>
<td>required</td>
<td>Nome do usuário</td>
</tr>
<tr>
<td><code>data</code></td>
<td>string</td>
<td>required</td>
<td>Nome do usuário</td>
</tr>
<tr>
<td><code>model_id</code></td>
<td>string</td>
<td>required</td>
<td>Nome do usuário</td>
</tr>
</tbody>
</table>
<!-- END_b633fffdebb9e331cbeb42dac7a46995 -->
<h1>Usuário</h1>
<!-- START_2b6e5a4b188cb183c7e59558cce36cb6 -->
<h2>Listar</h2>
<p>Lista de usuários cadastrados</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/user',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'query' =&gt; [
            'take'=&gt; 'similique',
            'skip'=&gt; 'aliquid',
            'order'=&gt; 'dicta',
            'orderDirection'=&gt; 'corrupti',
            'search'=&gt; 'mollitia',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/user</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>take</code></td>
<td>optional</td>
<td>Quantidade de registros que será retornado Ex: 20</td>
</tr>
<tr>
<td><code>skip</code></td>
<td>optional</td>
<td>Quantidade de registros para saltar Ex: 20</td>
</tr>
<tr>
<td><code>order</code></td>
<td>optional</td>
<td>Nome do campo para ordenar Ex: nome</td>
</tr>
<tr>
<td><code>orderDirection</code></td>
<td>optional</td>
<td>Direção da ordenação Ex: asc, desc</td>
</tr>
<tr>
<td><code>search</code></td>
<td>optional</td>
<td>Texto para ser utilizado como pesquisa entre os registros</td>
</tr>
</tbody>
</table>
<!-- END_2b6e5a4b188cb183c7e59558cce36cb6 -->
<!-- START_ceec0e0b1d13d731ad96603d26bccc2f -->
<h2>Consultar</h2>
<p>Esta rota retorna um usuário especifico</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/user/est',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost/api/user/est'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/user/{user}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>user</code></td>
<td>required</td>
<td>Id do usuário</td>
</tr>
</tbody>
</table>
<!-- END_ceec0e0b1d13d731ad96603d26bccc2f -->
<!-- START_f0654d3f2fc63c11f5723f233cc53c83 -->
<h2>Adicionar</h2>
<p>Esta rota cria um novo usuário</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost/api/user',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'json' =&gt; [
            'nome' =&gt; 'et',
            'senha' =&gt; 'in',
            'confirmacao_senha' =&gt; 'nisi',
            'email' =&gt; 'ut',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/user</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>nome</code></td>
<td>string</td>
<td>required</td>
<td>Nome do usuário</td>
</tr>
<tr>
<td><code>senha</code></td>
<td>string</td>
<td>required</td>
<td>Senha</td>
</tr>
<tr>
<td><code>confirmacao_senha</code></td>
<td>string</td>
<td>required</td>
<td>Confirmação de Senha</td>
</tr>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>required</td>
<td>Email</td>
</tr>
</tbody>
</table>
<!-- END_f0654d3f2fc63c11f5723f233cc53c83 -->
<!-- START_1857d3df71d357b05fb022b3b344cf91 -->
<h2>Modificar</h2>
<p>Esta rota faz alterações no cadastro do usuário</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost/api/user/1',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'json' =&gt; [
            'nome' =&gt; 'autem',
            'senha' =&gt; 'voluptatem',
            'confirmacao_senha' =&gt; 'nulla',
            'email' =&gt; 'molestiae',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/user/{user}</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>nome</code></td>
<td>string</td>
<td>required</td>
<td>Nome do usuário</td>
</tr>
<tr>
<td><code>senha</code></td>
<td>string</td>
<td>optional</td>
<td>Senha</td>
</tr>
<tr>
<td><code>confirmacao_senha</code></td>
<td>string</td>
<td>optional</td>
<td>Confirmação de Senha</td>
</tr>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>required</td>
<td>Email</td>
</tr>
</tbody>
</table>
<!-- END_1857d3df71d357b05fb022b3b344cf91 -->
<!-- START_4bb7fb4a7501d3cb1ed21acfc3b205a9 -->
<h2>Excluir</h2>
<p>Esta rota exclui o(s) usuário(s) passado como parâmetro {user} na url</p>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost/api/user/tempore',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost/api/user/tempore'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": true,
    "title": "Não Autorizado",
    "message": "Wrong number of segments",
    "status": 401,
    "response_code": 401
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/user/{user}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>user</code></td>
<td>required</td>
<td>Ids que serão excluídos separados por virgula Ex: 1,20,55</td>
</tr>
</tbody>
</table>
<!-- END_4bb7fb4a7501d3cb1ed21acfc3b205a9 -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="php">php</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                                    <a href="#" data-language-name="python">python</a>
                              </div>
                </div>
    </div>
  </body>
</html>