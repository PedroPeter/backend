---
title: API Reference

language_tabs:
- bash
- javascript

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

#general
<!-- START_26a8ade898ac2633b8662c5e7dcab934 -->
## Display a listing of the resource.

> Example request:

```bash
curl "http://localhost/dashboard/administradors" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/administradors",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/administradors`

`HEAD dashboard/administradors`


<!-- END_26a8ade898ac2633b8662c5e7dcab934 -->
<!-- START_d263adddb21b217ec6c6b35088e69647 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl "http://localhost/dashboard/administradors" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/administradors",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST dashboard/administradors`


<!-- END_d263adddb21b217ec6c6b35088e69647 -->
<!-- START_0fb4e66ab5255eceb0513e2959eda8ae -->
## Display the specified resource.

> Example request:

```bash
curl "http://localhost/dashboard/administradors/{administrador}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/administradors/{administrador}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/administradors/{administrador}`

`HEAD dashboard/administradors/{administrador}`


<!-- END_0fb4e66ab5255eceb0513e2959eda8ae -->
<!-- START_04b7cfde5830546fb58659789426542a -->
## Update the specified resource in storage.

> Example request:

```bash
curl "http://localhost/dashboard/administradors/{administrador}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/administradors/{administrador}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT dashboard/administradors/{administrador}`

`PATCH dashboard/administradors/{administrador}`


<!-- END_04b7cfde5830546fb58659789426542a -->
<!-- START_c861d3f5ae4dd67ccc74a9e19d4dbbdc -->
## Remove the specified resource from storage.

> Example request:

```bash
curl "http://localhost/dashboard/administradors/{administrador}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/administradors/{administrador}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE dashboard/administradors/{administrador}`


<!-- END_c861d3f5ae4dd67ccc74a9e19d4dbbdc -->
<!-- START_3df59d7f9e6de4a1ebe0210bc87d419e -->
## Enable a specified Promotor resource to act.

> Example request:

```bash
curl "http://localhost/dashboard/adicionarPromotor/{promotor}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/adicionarPromotor/{promotor}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/adicionarPromotor/{promotor}`

`HEAD dashboard/adicionarPromotor/{promotor}`


<!-- END_3df59d7f9e6de4a1ebe0210bc87d419e -->
<!-- START_a95cc89f3353e30edd98d2b7cda5345c -->
## Removes a specified Promotor.

> Example request:

```bash
curl "http://localhost/dashboard/removerPromotor/{promotor}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/removerPromotor/{promotor}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/removerPromotor/{promotor}`

`HEAD dashboard/removerPromotor/{promotor}`


<!-- END_a95cc89f3353e30edd98d2b7cda5345c -->
<!-- START_2a8dba0fbf723cdfaa2e0b8f84d0fbab -->
## Blocks a specified Usuario resource.

> Example request:

```bash
curl "http://localhost/dashboard/bloquearUsuario/{usuario}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/bloquearUsuario/{usuario}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/bloquearUsuario/{usuario}`

`HEAD dashboard/bloquearUsuario/{usuario}`


<!-- END_2a8dba0fbf723cdfaa2e0b8f84d0fbab -->
<!-- START_65c4f448e08986e75a282eaeac3aacd5 -->
## Verify the user acess.

> Example request:

```bash
curl "http://localhost/dashboard/isUsuarioBlocked/{usuario}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/isUsuarioBlocked/{usuario}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/isUsuarioBlocked/{usuario}`

`HEAD dashboard/isUsuarioBlocked/{usuario}`


<!-- END_65c4f448e08986e75a282eaeac3aacd5 -->
<!-- START_835185344d845dba6975e159141b4318 -->
## Display a listing of the resource.

> Example request:

```bash
curl "http://localhost/dashboard/promotores" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/promotores",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/promotores`

`HEAD dashboard/promotores`


<!-- END_835185344d845dba6975e159141b4318 -->
<!-- START_d7803aa1a74f29fc6a2659f51c42bcf5 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl "http://localhost/dashboard/promotores" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/promotores",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST dashboard/promotores`


<!-- END_d7803aa1a74f29fc6a2659f51c42bcf5 -->
<!-- START_b3a200d66aeb5e4fcda78dedd8a54a81 -->
## Display the specified resource.

> Example request:

```bash
curl "http://localhost/dashboard/promotores/{promotore}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/promotores/{promotore}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/promotores/{promotore}`

`HEAD dashboard/promotores/{promotore}`


<!-- END_b3a200d66aeb5e4fcda78dedd8a54a81 -->
<!-- START_d434f54bc400011d7baa47144431d249 -->
## Update the specified resource in storage.

> Example request:

```bash
curl "http://localhost/dashboard/promotores/{promotore}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/promotores/{promotore}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT dashboard/promotores/{promotore}`

`PATCH dashboard/promotores/{promotore}`


<!-- END_d434f54bc400011d7baa47144431d249 -->
<!-- START_68b9d6ce3917d6d406a9614957a47ff0 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl "http://localhost/dashboard/promotores/{promotore}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/promotores/{promotore}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE dashboard/promotores/{promotore}`


<!-- END_68b9d6ce3917d6d406a9614957a47ff0 -->
<!-- START_41b326974de59e2ae2b8052a2a2e1204 -->
## Relate Artista and Evento.

> Example request:

```bash
curl "http://localhost/dashboard/adicionarArtistaAoEvento/{artista}/{evento}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/adicionarArtistaAoEvento/{artista}/{evento}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/adicionarArtistaAoEvento/{artista}/{evento}`

`HEAD dashboard/adicionarArtistaAoEvento/{artista}/{evento}`


<!-- END_41b326974de59e2ae2b8052a2a2e1204 -->
<!-- START_2b763bf0f3c51ef6057ea5aedea2ab1c -->
## Send invites do user prefered promotor event&#039;s.

> Example request:

```bash
curl "http://localhost/dashboard/enviarConvites/{viewName}/{promotor}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/enviarConvites/{viewName}/{promotor}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/enviarConvites/{viewName}/{promotor}`

`HEAD dashboard/enviarConvites/{viewName}/{promotor}`


<!-- END_2b763bf0f3c51ef6057ea5aedea2ab1c -->
<!-- START_8fa7d6ef88cf13bd5c50505357fcc574 -->
## Display a listing of the resource.

> Example request:

```bash
curl "http://localhost/dashboard/usuarios" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/usuarios",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/usuarios`

`HEAD dashboard/usuarios`


<!-- END_8fa7d6ef88cf13bd5c50505357fcc574 -->
<!-- START_c065dbdfc1eb2c02e048e580dcc5012a -->
## Store a newly created resource in storage.

> Example request:

```bash
curl "http://localhost/dashboard/usuarios" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/usuarios",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST dashboard/usuarios`


<!-- END_c065dbdfc1eb2c02e048e580dcc5012a -->
<!-- START_1539c73b8c498fc75fba53c43cf21428 -->
## Display the specified resource.

> Example request:

```bash
curl "http://localhost/dashboard/usuarios/{usuario}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/usuarios/{usuario}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET dashboard/usuarios/{usuario}`

`HEAD dashboard/usuarios/{usuario}`


<!-- END_1539c73b8c498fc75fba53c43cf21428 -->
<!-- START_f45cd93312e969bb08c24ad75fdb5ee5 -->
## Update the specified resource in storage.

> Example request:

```bash
curl "http://localhost/dashboard/usuarios/{usuario}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/usuarios/{usuario}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT dashboard/usuarios/{usuario}`

`PATCH dashboard/usuarios/{usuario}`


<!-- END_f45cd93312e969bb08c24ad75fdb5ee5 -->
<!-- START_f6b0ace7e6102d5d452c629fe8782ebd -->
## Remove the specified resource from storage.

> Example request:

```bash
curl "http://localhost/dashboard/usuarios/{usuario}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/usuarios/{usuario}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE dashboard/usuarios/{usuario}`


<!-- END_f6b0ace7e6102d5d452c629fe8782ebd -->
<!-- START_cf0d89e658a89ca4a8f0840020aacd02 -->
## Send invites do user prefered promotor event&#039;s.

> Example request:

```bash
curl "http://localhost/dashboard/usuario/eventoFavorito/eventos" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/usuario/eventoFavorito/eventos",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST dashboard/usuario/eventoFavorito/eventos`


<!-- END_cf0d89e658a89ca4a8f0840020aacd02 -->
<!-- START_6dccaab01e57044a431f6a0dff77b52d -->
## Notif users of the system.

> Example request:

```bash
curl "http://localhost/dashboard/notificar/{notificacao}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/dashboard/notificar/{notificacao}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT dashboard/notificar/{notificacao}`


<!-- END_6dccaab01e57044a431f6a0dff77b52d -->
