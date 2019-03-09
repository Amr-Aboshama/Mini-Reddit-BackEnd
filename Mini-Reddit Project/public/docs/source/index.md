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
<!-- START_875cd86a393e951f2e40dacfdafbf3bb -->
## api/delete/account
> Example request:

```bash
curl -X DELETE "http://localhost/api/delete/account" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"nDhRHIaQdNq2GJuS","token":"Vpb56wDvGeFVrjCh","password":"moC3OV1uOUWct5kT"}'

```

```javascript
const url = new URL("http://localhost/api/delete/account");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "nDhRHIaQdNq2GJuS",
    "token": "Vpb56wDvGeFVrjCh",
    "password": "moC3OV1uOUWct5kT"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`DELETE api/delete/account`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user
    token | string |  required  | the token of the current user
    password | string |  required  | the password of te current user

<!-- END_875cd86a393e951f2e40dacfdafbf3bb -->

<!-- START_03470c601f8743034f8c81ff2f9e0fa0 -->
## api/change/password
> Example request:

```bash
curl -X PATCH "http://localhost/api/change/password" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"xfnCe8y2agSsOPzJ","token":"gi14QpCOUIND8hs6","password":"Iad7WVdmPFN9Wehh","new_password":"XaQSqJjvqq0TB03i","confirm_new_password":"f7nM6QBk2A5GvcAD"}'

```

```javascript
const url = new URL("http://localhost/api/change/password");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "xfnCe8y2agSsOPzJ",
    "token": "gi14QpCOUIND8hs6",
    "password": "Iad7WVdmPFN9Wehh",
    "new_password": "XaQSqJjvqq0TB03i",
    "confirm_new_password": "f7nM6QBk2A5GvcAD"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```
> Example response (404):

```json
{}
```

### HTTP Request
`PATCH api/change/password`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user
    token | string |  required  | the token of the current user
    password | string |  required  | the current password of the current user
    new_password | string |  required  | the new password of the current user
    confirm_new_password | string |  required  | the new password of the current user

<!-- END_03470c601f8743034f8c81ff2f9e0fa0 -->

<!-- START_96349a87acc022862721573fa61a1cff -->
## api/followers
> Example request:

```bash
curl -X POST "http://localhost/api/followers" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"z7ZQUtYsbmEQRvTx","token":"ZRhevvXyv5kZ4fBy"}'

```

```javascript
const url = new URL("http://localhost/api/followers");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "z7ZQUtYsbmEQRvTx",
    "token": "ZRhevvXyv5kZ4fBy"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "follwersList": [
        "John Smith"
    ]
}
```

### HTTP Request
`POST api/followers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user
    token | string |  required  | the token of the current user

<!-- END_96349a87acc022862721573fa61a1cff -->

<!-- START_c73fde337ba9158af92919c2c62be618 -->
## api/following
> Example request:

```bash
curl -X POST "http://localhost/api/following" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"AbcmJuOJgAsBYrMu","token":"3KKIgWeVz3a6AI6c"}'

```

```javascript
const url = new URL("http://localhost/api/following");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "AbcmJuOJgAsBYrMu",
    "token": "3KKIgWeVz3a6AI6c"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "follwingList": [
        "John Smith"
    ]
}
```

### HTTP Request
`POST api/following`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user
    token | string |  required  | the token of the current user

<!-- END_c73fde337ba9158af92919c2c62be618 -->

<!-- START_a6599d3b09cd3dee40e8cdd1406e0362 -->
## api/add/link
> Example request:

```bash
curl -X POST "http://localhost/api/add/link" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"TUzlLKFtNIFHD1m2","token":"khAqPltZ65CvFyNv","post_content":"FYTp983aXUG7GokY","parent_link_ID":16,"post_title":"LvI43jGybpZVegtL","community_ID":16}'

```

```javascript
const url = new URL("http://localhost/api/add/link");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "TUzlLKFtNIFHD1m2",
    "token": "khAqPltZ65CvFyNv",
    "post_content": "FYTp983aXUG7GokY",
    "parent_link_ID": 16,
    "post_title": "LvI43jGybpZVegtL",
    "community_ID": 16
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/add/link`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user
    token | string |  required  | the token of the current user
    post_content | string |  required  | the content written in the post
    parent_link_ID | integer |  required  | the ID of the parent link, this parameter should be 'null' if the link is a post
    post_title | string |  optional  | this parameter is required only for posts
    community_ID | integer |  optional  | this parameter is required only if the link is inside a community

<!-- END_a6599d3b09cd3dee40e8cdd1406e0362 -->

<!-- START_a5149d059f60d19ba4c67da48b957a6c -->
## api/pin/post
> Example request:

```bash
curl -X PATCH "http://localhost/api/pin/post" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"vwDIrXGAzKbTXF7U","token":"8DjJQpx00qtCgkUF","post_id":14}'

```

```javascript
const url = new URL("http://localhost/api/pin/post");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "vwDIrXGAzKbTXF7U",
    "token": "8DjJQpx00qtCgkUF",
    "post_id": 14
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`PATCH api/pin/post`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.
    post_id | integer |  required  | the id of the post that the user wants to pin

<!-- END_a5149d059f60d19ba4c67da48b957a6c -->

<!-- START_1f0d9225d3f3ebf955bcdbe54c0f41b1 -->
## api/remove/link
> Example request:

```bash
curl -X DELETE "http://localhost/api/remove/link" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"XwfwpJzEc6QQU8E4","token":"RkCWbjX5a4mjQJId","link_ID":4}'

```

```javascript
const url = new URL("http://localhost/api/remove/link");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "XwfwpJzEc6QQU8E4",
    "token": "RkCWbjX5a4mjQJId",
    "link_ID": 4
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```
> Example response (400):

```json
{
    "message": "you are not authorized to remove the link"
}
```

### HTTP Request
`DELETE api/remove/link`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user
    token | string |  required  | the token of the current user
    link_ID | integer |  required  | the ID of the link

<!-- END_1f0d9225d3f3ebf955bcdbe54c0f41b1 -->

<!-- START_e5dbda86a05b7b8cf4afaeea6d4c7b5b -->
## api/blocked/users
> Example request:

```bash
curl -X POST "http://localhost/api/blocked/users" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"1ZWd8wBq90MZpU1r","token":"NTWPbAYzYoYMBeZO"}'

```

```javascript
const url = new URL("http://localhost/api/blocked/users");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "1ZWd8wBq90MZpU1r",
    "token": "NTWPbAYzYoYMBeZO"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "blockedList": [
        "John Smith"
    ]
}
```

### HTTP Request
`POST api/blocked/users`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user
    token | string |  optional  | reuired the token of the current user

<!-- END_e5dbda86a05b7b8cf4afaeea6d4c7b5b -->

<!-- START_17f942ce934edc56ba61a54525b301a5 -->
## api/blocking/users
> Example request:

```bash
curl -X POST "http://localhost/api/blocking/users" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"7yJjQC2DbvkXDRNI","token":"C5wBy6CtQb6A1Zei","username":"zoV6yKq2J0oFrkfW"}'

```

```javascript
const url = new URL("http://localhost/api/blocking/users");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "7yJjQC2DbvkXDRNI",
    "token": "C5wBy6CtQb6A1Zei",
    "username": "zoV6yKq2J0oFrkfW"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/blocking/users`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user
    token | string |  required  | the token of the current user
    username | string |  required  | the username of the user being un/blocked

<!-- END_17f942ce934edc56ba61a54525b301a5 -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## APIs for managing authentication

> Example request:

```bash
curl -X POST "http://localhost/api/login" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"3jlv8N5QygezBZ1W","password":"mjLZpnn8k3P8hMFI"}'

```

```javascript
const url = new URL("http://localhost/api/login");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "3jlv8N5QygezBZ1W",
    "password": "mjLZpnn8k3P8hMFI"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/login`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    password | string |  required  | The password of the user.

<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_68ff8c9e5dd1db295b6f780b9fcfbeb2 -->
## APIs for managing authentication

> Example request:

```bash
curl -X POST "http://localhost/api/signUp" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"Ye83h24qjk74HIkM","password":"LD24OGdqmmAgDIDK","email":"ID7QPLVwAdqRyO30"}'

```

```javascript
const url = new URL("http://localhost/api/signUp");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "Ye83h24qjk74HIkM",
    "password": "LD24OGdqmmAgDIDK",
    "email": "ID7QPLVwAdqRyO30"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/signUp`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    password | string |  required  | The password of the user.
    email | string |  required  | The email of the user.

<!-- END_68ff8c9e5dd1db295b6f780b9fcfbeb2 -->

<!-- START_458fb114ed2096a0e077809c606a66cd -->
## APIs for managing authentication

> Example request:

```bash
curl -X POST "http://localhost/api/forgetPassword" \
    -H "Content-Type: application/json" \
    -d '{"email":"2Bx1a21IzAtaSyCa"}'

```

```javascript
const url = new URL("http://localhost/api/forgetPassword");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "2Bx1a21IzAtaSyCa"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/forgetPassword`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | The email of the user.

<!-- END_458fb114ed2096a0e077809c606a66cd -->

<!-- START_b4f4625b609a18310a50b1dddf752a55 -->
## APIs for managing authentication

> Example request:

```bash
curl -X POST "http://localhost/api/resetPassword" \
    -H "Content-Type: application/json" \
    -d '{"my_new_password":"eCekxQHBhaNSO1xI","my_new_password_confirm":"OHNUI2jvzo39Za9K"}'

```

```javascript
const url = new URL("http://localhost/api/resetPassword");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_new_password": "eCekxQHBhaNSO1xI",
    "my_new_password_confirm": "OHNUI2jvzo39Za9K"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/resetPassword`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_new_password | string |  required  | The new password of the user .
    my_new_password_confirm | string |  required  | The new password confirmation of the user .

<!-- END_b4f4625b609a18310a50b1dddf752a55 -->

<!-- START_5f094b60487491ed74578870381cb9d6 -->
## APIs for managing user information

> Example request:

```bash
curl -X POST "http://localhost/api/viewPrivateUserInfo" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"lErnWARfTtGgeWzI","token":"fkcGQtWn688Y2RUS"}'

```

```javascript
const url = new URL("http://localhost/api/viewPrivateUserInfo");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "lErnWARfTtGgeWzI",
    "token": "fkcGQtWn688Y2RUS"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "email": "john_bb@gmail"
}
```

### HTTP Request
`POST api/viewPrivateUserInfo`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.

<!-- END_5f094b60487491ed74578870381cb9d6 -->

<!-- START_1e834d0395489c39f26e9757f305ad2c -->
## APIs for managing user information

> Example request:

```bash
curl -X POST "http://localhost/api/viewPublicUserInfo" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"7IT2StteVbZ1EMCL","token":"0mDYj7bKJK88KCK3"}'

```

```javascript
const url = new URL("http://localhost/api/viewPublicUserInfo");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "7IT2StteVbZ1EMCL",
    "token": "0mDYj7bKJK88KCK3"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "username": "john",
    "karma": 500,
    "cake_day": "March 8, 2019",
    "about": "be or not to be"
}
```

### HTTP Request
`POST api/viewPublicUserInfo`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.

<!-- END_1e834d0395489c39f26e9757f305ad2c -->

<!-- START_e85feccdd48f9f01868d7b854c38ad2c -->
## api/viewUserCommunities
> Example request:

```bash
curl -X POST "http://localhost/api/viewUserCommunities" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"5H20WuGnC0LCJFE7","username":"jVcgE5cACRu7tdw9","token":"Q0U2MRN8tawm0rId"}'

```

```javascript
const url = new URL("http://localhost/api/viewUserCommunities");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "5H20WuGnC0LCJFE7",
    "username": "jVcgE5cACRu7tdw9",
    "token": "Q0U2MRN8tawm0rId"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "communities": [
        {
            "community_name": "Arduino",
            "community_logo": "logo1"
        },
        {
            "community_name": "machine",
            "community_logo": "logo2"
        }
    ]
}
```

### HTTP Request
`POST api/viewUserCommunities`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    username | string |  required  | the username of the user who has the communities.
    token | string |  required  | the token of the user and it is required for authontication.

<!-- END_e85feccdd48f9f01868d7b854c38ad2c -->

<!-- START_ac82c7107f85f94d030c8065c314dc88 -->
## api/hideOrUnhidePost
> Example request:

```bash
curl -X POST "http://localhost/api/hideOrUnhidePost" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"XmVKqZEitfXm4WE9","token":"CwgrOs7dPqsr0UGG","post_id":10}'

```

```javascript
const url = new URL("http://localhost/api/hideOrUnhidePost");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "XmVKqZEitfXm4WE9",
    "token": "CwgrOs7dPqsr0UGG",
    "post_id": 10
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/hideOrUnhidePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.
    post_id | integer |  required  | the id of the post that the user wants to hide

<!-- END_ac82c7107f85f94d030c8065c314dc88 -->

<!-- START_e07a871cd0422bf498c70034a3a062cc -->
## api/editAPost
> Example request:

```bash
curl -X POST "http://localhost/api/editAPost" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"hQiqsr9aCcr6wRcK","token":"lFRrcVKICqf8uelE","post_id":12}'

```

```javascript
const url = new URL("http://localhost/api/editAPost");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "hQiqsr9aCcr6wRcK",
    "token": "lFRrcVKICqf8uelE",
    "post_id": 12
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/editAPost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.
    post_id | integer |  required  | the id of the post that the user wants to edit

<!-- END_e07a871cd0422bf498c70034a3a062cc -->

<!-- START_cc0005e14d2ec89cc33b149d7dd83ff4 -->
## api/editAComment
> Example request:

```bash
curl -X POST "http://localhost/api/editAComment" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"6fHBWLiBHZbCUBel","token":"fVKmxDAKmPQ4uzu9","comment_id":10}'

```

```javascript
const url = new URL("http://localhost/api/editAComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "6fHBWLiBHZbCUBel",
    "token": "fVKmxDAKmPQ4uzu9",
    "comment_id": 10
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/editAComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.
    comment_id | integer |  required  | the id of the comment that the user wants to edit

<!-- END_cc0005e14d2ec89cc33b149d7dd83ff4 -->

<!-- START_c72dfc475b091c89dda351eb1a1bac3d -->
## api/pinOrUnpinAPost
> Example request:

```bash
curl -X POST "http://localhost/api/pinOrUnpinAPost" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"g8v8Mq3WA13xA4l7","token":"zyn8pUnfsM9eidGu","post_id":14}'

```

```javascript
const url = new URL("http://localhost/api/pinOrUnpinAPost");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "g8v8Mq3WA13xA4l7",
    "token": "zyn8pUnfsM9eidGu",
    "post_id": 14
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/pinOrUnpinAPost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.
    post_id | integer |  required  | the id of the post that the user wants to pin

<!-- END_c72dfc475b091c89dda351eb1a1bac3d -->

<!-- START_ce420c8cc2fdc61a7e1d058d62b233f9 -->
## api/addOrRemoveDownvotePost
> Example request:

```bash
curl -X POST "http://localhost/api/addOrRemoveDownvotePost" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"iuDM9w2l2SDTRKc6","token":"iC8HDejtR34MdZam","post_id":14}'

```

```javascript
const url = new URL("http://localhost/api/addOrRemoveDownvotePost");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "iuDM9w2l2SDTRKc6",
    "token": "iC8HDejtR34MdZam",
    "post_id": 14
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/addOrRemoveDownvotePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.
    post_id | integer |  required  | the id of the post that the user wants to downvote

<!-- END_ce420c8cc2fdc61a7e1d058d62b233f9 -->

<!-- START_4fa2974c36ffd9539405cf8b79503935 -->
## api/addOrRemoveDownvoteComment
> Example request:

```bash
curl -X POST "http://localhost/api/addOrRemoveDownvoteComment" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"WEMKRYBHKVn6Z4HX","token":"QjcEjzNdIRpre6fa","comment_id":20}'

```

```javascript
const url = new URL("http://localhost/api/addOrRemoveDownvoteComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "WEMKRYBHKVn6Z4HX",
    "token": "QjcEjzNdIRpre6fa",
    "comment_id": 20
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`POST api/addOrRemoveDownvoteComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.
    comment_id | integer |  required  | the id of the comment that the user wants to downvote

<!-- END_4fa2974c36ffd9539405cf8b79503935 -->

<!-- START_1b58ba75a2c14fa05e464b95d16fe8ce -->
## APIs for managing user Messages

> Example request:

```bash
curl -X POST "http://localhost/api/viewAUserMessage" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"sOZ5RPUDugyjv5rY","token":"LIrSFmKEOumKiK7j","message_id":11}'

```

```javascript
const url = new URL("http://localhost/api/viewAUserMessage");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "sOZ5RPUDugyjv5rY",
    "token": "LIrSFmKEOumKiK7j",
    "message_id": 11
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "username2": "lolo",
    "photo": "photo3",
    "message_content": "hello world"
}
```

### HTTP Request
`POST api/viewAUserMessage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.
    message_id | integer |  required  | the id of  the message that the user wants to see

<!-- END_1b58ba75a2c14fa05e464b95d16fe8ce -->

<!-- START_b12374bc5ceb98711d916ceeaebc9117 -->
## APIs for managing user Messages

> Example request:

```bash
curl -X POST "http://localhost/api/viewUserSentMessages" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"OAiUZcFpwxCpa4H0","token":"7HyviU2NbiHq5LVz"}'

```

```javascript
const url = new URL("http://localhost/api/viewUserSentMessages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "OAiUZcFpwxCpa4H0",
    "token": "7HyviU2NbiHq5LVz"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "messages": [
        {
            "reciever_name": "maged",
            "reciever_photo": "photo1",
            "message_content": "hello world"
        },
        {
            "reciever_name": "nour",
            "reciever_photo": "photo2",
            "message_content": "hello world tany"
        }
    ]
}
```

### HTTP Request
`POST api/viewUserSentMessages`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.

<!-- END_b12374bc5ceb98711d916ceeaebc9117 -->

<!-- START_4e1f7cd0181146447124a0cd1d1da9f9 -->
## APIs for managing user Messages

> Example request:

```bash
curl -X POST "http://localhost/api/viewUserInboxMessages" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"lCb2dIjffb39ohym","token":"jjrVRe1vdCqJuFbW","state":3}'

```

```javascript
const url = new URL("http://localhost/api/viewUserInboxMessages");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "lCb2dIjffb39ohym",
    "token": "jjrVRe1vdCqJuFbW",
    "state": 3
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "messages": [
        {
            "sender_name": "maged",
            "sender_photo": "photo1",
            "message_content": "hello world"
        },
        {
            "sender_name": "nour",
            "sender_photo": "photo2",
            "message_content": "hello world tany"
        }
    ]
}
```

### HTTP Request
`POST api/viewUserInboxMessages`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    token | string |  required  | the token of the user and it is required for authontication.
    state | integer |  required  | 1 if unread messages ,2 if all messages,3 if notified messages

<!-- END_4e1f7cd0181146447124a0cd1d1da9f9 -->

<!-- START_f7828fe70326ce6166fdba9c0c9d80ed -->
## This is used to search for a community or a user.

> Example request:

```bash
curl -X GET -G "http://localhost/api/search" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"uBxIjQW3DYAVcBMv","token":"hy7l9d38jxw6csY6","search_content":"iM2G8IeYZT06vppO"}'

```

```javascript
const url = new URL("http://localhost/api/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "uBxIjQW3DYAVcBMv",
    "token": "hy7l9d38jxw6csY6",
    "search_content": "iM2G8IeYZT06vppO"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "message": "Too few arguments to function App\\Http\\Controllers\\SearchingController::search(), 0 passed and exactly 3 expected",
    "exception": "Symfony\\Component\\Debug\\Exception\\FatalThrowableError",
    "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\app\\Http\\Controllers\\SearchingController.php",
    "line": 17,
    "trace": [
        {
            "function": "search",
            "class": "App\\Http\\Controllers\\SearchingController",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "call_user_func_array"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 219,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 176,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 680,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 58,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 657,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 623,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 612,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 275,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 259,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 36,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\Generator.php",
            "line": 57,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 201,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 59,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 32,
            "function": "call_user_func_array"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 90,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 34,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 580,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\symfony\\console\\Application.php",
            "line": 908,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\symfony\\console\\Application.php",
            "line": 269,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 90,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET api/search`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | The username of the current user.
    token | string |  required  | The token of the current user.
    search_content | string |  required  | The string the user searching for.

<!-- END_f7828fe70326ce6166fdba9c0c9d80ed -->

<!-- START_e00fdc656f682e46daf03bfec3655e27 -->
## This is used to send a message to another user.

> Example request:

```bash
curl -X POST "http://localhost/api/sendMsg" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"s6zkZA1u9sCOpLWb","token":"95dy3lLawOzm9Ita","rec_username":"waRvjZpsvb3Ds6sb","msg_content":"OiAZqMPuOTAIhjBG"}'

```

```javascript
const url = new URL("http://localhost/api/sendMsg");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "s6zkZA1u9sCOpLWb",
    "token": "95dy3lLawOzm9Ita",
    "rec_username": "waRvjZpsvb3Ds6sb",
    "msg_content": "OiAZqMPuOTAIhjBG"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/sendMsg`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | The username of the sender user.
    token | string |  required  | The token of the sender user.
    rec_username | string |  required  | The username of the reciever user.
    msg_content | string |  required  | The content of the message to be sent.

<!-- END_e00fdc656f682e46daf03bfec3655e27 -->

<!-- START_e160d221a0a1b0cc25c171415bb92fe7 -->
## api/commRules
> Example request:

```bash
curl -X GET -G "http://localhost/api/commRules" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"z1lEH8KpJVLYZ9pt","token":"lkBeWwMpoHsK9y2D","comm_id":18}'

```

```javascript
const url = new URL("http://localhost/api/commRules");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "z1lEH8KpJVLYZ9pt",
    "token": "lkBeWwMpoHsK9y2D",
    "comm_id": 18
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "message": "Too few arguments to function App\\Http\\Controllers\\CommunitiesController::viewCommRulesDesc(), 0 passed and exactly 3 expected",
    "exception": "Symfony\\Component\\Debug\\Exception\\FatalThrowableError",
    "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\app\\Http\\Controllers\\CommunitiesController.php",
    "line": 33,
    "trace": [
        {
            "function": "viewCommRulesDesc",
            "class": "App\\Http\\Controllers\\CommunitiesController",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "call_user_func_array"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 219,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 176,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 680,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 58,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 657,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 623,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 612,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 275,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 259,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 36,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\Generator.php",
            "line": 57,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 201,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 59,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 32,
            "function": "call_user_func_array"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 90,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 34,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 580,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\symfony\\console\\Application.php",
            "line": 908,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\symfony\\console\\Application.php",
            "line": 269,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 90,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\GitHub\\Mini-Reddit-BackEnd\\Mini-Reddit Project\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET api/commRules`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | The username of the current user.
    token | string |  required  | The token of the current user.
    comm_id | integer |  required  | The ID of the community the user want to show its rules and description.

<!-- END_e160d221a0a1b0cc25c171415bb92fe7 -->

<!-- START_f3fee839178d60334b9eea2d27339aea -->
## api/editComm
> Example request:

```bash
curl -X PATCH "http://localhost/api/editComm" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"Ft2ThcUSIrdEuD5s","token":"pvHaZ9Eej4Jm6LZE","comm_id":2,"rules_content":"JKNWSnsfl9xbFyxb","des_content":"9DmzcWWpfIemVY5u"}'

```

```javascript
const url = new URL("http://localhost/api/editComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "Ft2ThcUSIrdEuD5s",
    "token": "pvHaZ9Eej4Jm6LZE",
    "comm_id": 2,
    "rules_content": "JKNWSnsfl9xbFyxb",
    "des_content": "9DmzcWWpfIemVY5u"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PATCH api/editComm`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | The username of the current user "should be the moderator of the community".
    token | string |  required  | The token of the current user.
    comm_id | integer |  required  | The ID of the community the user want to edit its rules& description.
    rules_content | string |  required  | The edited rules of the community.
    des_content | string |  required  | The edited discription of the community.

<!-- END_f3fee839178d60334b9eea2d27339aea -->

<!-- START_d09c8da2e2ceedb52aacd624bf20d7d5 -->
## api/createComm
> Example request:

```bash
curl -X POST "http://localhost/api/createComm" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"cK2DuVayO2dzmLDN","token":"2ClVoWE4m10DYtCQ","comm_name":"U1vrrY6omVBAUxwf"}'

```

```javascript
const url = new URL("http://localhost/api/createComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "cK2DuVayO2dzmLDN",
    "token": "2ClVoWE4m10DYtCQ",
    "comm_name": "U1vrrY6omVBAUxwf"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/createComm`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | The username of the current user.
    token | string |  required  | The token of the current user.
    comm_name | string |  required  | The Name of the community to be created.

<!-- END_d09c8da2e2ceedb52aacd624bf20d7d5 -->

<!-- START_c01395a16391dbcf8d6b781801dcec57 -->
## This is used to remove an existing community.

> Example request:

```bash
curl -X DELETE "http://localhost/api/removeComm" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"xwtQNo4j9FOsVFwS","token":"pW9BqlcPLczrGAnQ","comm_id":13}'

```

```javascript
const url = new URL("http://localhost/api/removeComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "xwtQNo4j9FOsVFwS",
    "token": "pW9BqlcPLczrGAnQ",
    "comm_id": 13
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/removeComm`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | The username of the current user.
    token | string |  required  | The token of the current user.
    comm_id | integer |  required  | The ID of the community to be removed.

<!-- END_c01395a16391dbcf8d6b781801dcec57 -->

<!-- START_f119272b420e1705e6f1dc4560489020 -->
## This is used to add a moderator for an existing community.

> Example request:

```bash
curl -X PATCH "http://localhost/api/addModerator" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"K7dhH6qEbt6fOvH0","token":"tVRpWKQNOYvvAmwm","comm_id":9,"mod_username":"AY0lEXkxBaTgytcb"}'

```

```javascript
const url = new URL("http://localhost/api/addModerator");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "K7dhH6qEbt6fOvH0",
    "token": "tVRpWKQNOYvvAmwm",
    "comm_id": 9,
    "mod_username": "AY0lEXkxBaTgytcb"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PATCH api/addModerator`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | The username of the current user.
    token | string |  required  | The token of the current user.
    comm_id | integer |  required  | The ID of the community to add a moderator for.
    mod_username | string |  required  | The username of the moderator to be set for the community.

<!-- END_f119272b420e1705e6f1dc4560489020 -->

<!-- START_c466c4d60c2110954032ce8409e47be0 -->
## This is used to remove an existing moderator of a community.

> Example request:

```bash
curl -X PATCH "http://localhost/api/removeModerator" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"K3biwkJbl0ASfJyE","token":"jSeNoHDm8a3LFRvo","comm_id":4,"mod_username":"LOW3MbH8D4srBHMy"}'

```

```javascript
const url = new URL("http://localhost/api/removeModerator");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "K3biwkJbl0ASfJyE",
    "token": "jSeNoHDm8a3LFRvo",
    "comm_id": 4,
    "mod_username": "LOW3MbH8D4srBHMy"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PATCH api/removeModerator`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | The username of the current user.
    token | string |  required  | The token of the current user.
    comm_id | integer |  required  | The ID of the community to remove a moderator from.
    mod_username | string |  required  | The username of the moderator to be removed from the community.

<!-- END_c466c4d60c2110954032ce8409e47be0 -->

<!-- START_4d192ec263738cebee9b2b1f8da3d9dc -->
## This is used to subscribe or unsubscribe an existing community.

> Example request:

```bash
curl -X PATCH "http://localhost/api/subscriptionComm" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"gXC9hsuNSfXCJ1qh","token":"n1yNuNuL2iEwetf4","comm_id":19}'

```

```javascript
const url = new URL("http://localhost/api/subscriptionComm");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "gXC9hsuNSfXCJ1qh",
    "token": "n1yNuNuL2iEwetf4",
    "comm_id": 19
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PATCH api/subscriptionComm`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | The username of the current user.
    token | string |  required  | The token of the current user.
    comm_id | integer |  required  | The ID of the community to be un/subscribed.

<!-- END_4d192ec263738cebee9b2b1f8da3d9dc -->

<!-- START_1781dab8090dc1418958fe7eae15d072 -->
## This is used to save or unsave a post or a comment.

> Example request:

```bash
curl -X PATCH "http://localhost/api/savingLink" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"IUSbRSozc4MxN3hT","token":"En8BrD7A26VRz3Rg","link_id":11}'

```

```javascript
const url = new URL("http://localhost/api/savingLink");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "IUSbRSozc4MxN3hT",
    "token": "En8BrD7A26VRz3Rg",
    "link_id": 11
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PATCH api/savingLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | The username of the current user.
    token | string |  required  | The token of the current user.
    link_id | integer |  required  | The ID of the post/comment to be saved or unsaved.

<!-- END_1781dab8090dc1418958fe7eae15d072 -->

<!-- START_9cd007772ad33be318c0418f52e249a3 -->
## api/update/display/name
> Example request:

```bash
curl -X PATCH "http://localhost/api/update/display/name" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"tgWyOxVcMJ2Pfy2p","token":"VnFIHOg0IjhCEJfU","display_name":"m6xlPPenMnVWsgme"}'

```

```javascript
const url = new URL("http://localhost/api/update/display/name");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "tgWyOxVcMJ2Pfy2p",
    "token": "VnFIHOg0IjhCEJfU",
    "display_name": "m6xlPPenMnVWsgme"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`PATCH api/update/display/name`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user
    token | string |  required  | the token of the current user
    display_name | string |  required  | the username of the user being un/blocked

<!-- END_9cd007772ad33be318c0418f52e249a3 -->

<!-- START_b3210da22b1ea5a3e3362f3d87efcadd -->
## api/update/about
> Example request:

```bash
curl -X PATCH "http://localhost/api/update/about" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"1hehw2J0zsMJTZ6w","token":"Ef0xVhYMGHPdXaum","about":"x3Y8N9LOhRNGEBty"}'

```

```javascript
const url = new URL("http://localhost/api/update/about");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "1hehw2J0zsMJTZ6w",
    "token": "Ef0xVhYMGHPdXaum",
    "about": "x3Y8N9LOhRNGEBty"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[]
```

### HTTP Request
`PATCH api/update/about`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user
    token | string |  required  | the token of the current user
    about | string |  required  | the username of the user being un/blocked

<!-- END_b3210da22b1ea5a3e3362f3d87efcadd -->


