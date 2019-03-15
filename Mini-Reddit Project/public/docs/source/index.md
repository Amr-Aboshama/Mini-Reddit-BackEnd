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

#Account settings
<!-- START_815884eb756fda4323728b1d5e7659ec -->
## Delete current user account

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/delete/account" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"password":"sXXB2FMQPkibpi3q"}'

```

```javascript
const url = new URL("http://localhost/api/auth/delete/account");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "password": "sXXB2FMQPkibpi3q"
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "password isn't correct"
}
```

### HTTP Request
`DELETE api/auth/delete/account`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    password | string |  required  | the password of te current user

<!-- END_815884eb756fda4323728b1d5e7659ec -->

<!-- START_275f3a21a40a3c943e11c3042e080a07 -->
## Change current user password

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/auth/change/password" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"password":"iBGOlOM4tTcjK82B","new_password":"MAW2XIHyn7tCERTW","confirm_new_password":"F3dbp44YeMJ9wMSQ"}'

```

```javascript
const url = new URL("http://localhost/api/auth/change/password");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "password": "iBGOlOM4tTcjK82B",
    "new_password": "MAW2XIHyn7tCERTW",
    "confirm_new_password": "F3dbp44YeMJ9wMSQ"
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
{
    "success": "true"
}
```
> Example response (404):

```json
{
    "success": "false",
    "error": "new password doesn't match the confirmation"
}
```
> Example response (404):

```json
{
    "success": "false",
    "error": "wrong old passwords"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```

### HTTP Request
`PATCH api/auth/change/password`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    password | string |  required  | the current password of the current user
    new_password | string |  required  | the new password of the current user
    confirm_new_password | string |  required  | the new password of the current user

<!-- END_275f3a21a40a3c943e11c3042e080a07 -->

<!-- START_dfd1f84709d37e78da0a09b0dde49ae3 -->
## Update current user Displayed Name

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/auth/updateDisplayName" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"name":"M0kA6h4srSbRBlPe"}'

```

```javascript
const url = new URL("http://localhost/api/auth/updateDisplayName");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "name": "M0kA6h4srSbRBlPe"
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "sucess": "true",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "user must have a name"
}
```

### HTTP Request
`PATCH api/auth/updateDisplayName`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The new name of user to update.

<!-- END_dfd1f84709d37e78da0a09b0dde49ae3 -->

<!-- START_27bac20603448461f03965177b89d240 -->
## Update current user About

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/auth/updateAbout" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"about":"7Kjto7nDRx1vPy8P"}'

```

```javascript
const url = new URL("http://localhost/api/auth/updateAbout");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "about": "7Kjto7nDRx1vPy8P"
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "sucess": "true",
    "error": "UnAuthorized"
}
```

### HTTP Request
`PATCH api/auth/updateAbout`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    about | string |  required  | the content of about to be updated to

<!-- END_27bac20603448461f03965177b89d240 -->

<!-- START_2aad006d6bb8ce4439f456a5a44928ec -->
## Update user profile image

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/auth/updateProfileImage" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"profile_image":"Jz9o2o3URV6RmsNx"}'

```

```javascript
const url = new URL("http://localhost/api/auth/updateProfileImage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "profile_image": "Jz9o2o3URV6RmsNx"
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
{
    "success": "true",
    "path": "sotrage\/app\/avatar.jpg"
}
```
> Example response (401):

```json
{
    "sucess": "false",
    "error": "UnAuthorized"
}
```
> Example response (401):

```json
{
    "sucess": "false",
    "error": "Unsupported media type"
}
```
> Example response (400):

```json
{
    "sucess": "false",
    "error": "Cannot upload the image"
}
```

### HTTP Request
`PATCH api/auth/updateProfileImage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    profile_image | file |  required  | User's new profile image.

<!-- END_2aad006d6bb8ce4439f456a5a44928ec -->

#Authentication
sign in , sign up .....etc
<!-- START_62b2bf96e5822d93574a44e6d4b39d50 -->
## Sign Out a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/signOut" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/auth/signOut");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "User is not signed in"
}
```

### HTTP Request
`POST api/auth/signOut`


<!-- END_62b2bf96e5822d93574a44e6d4b39d50 -->

<!-- START_3326cf80694aff2cc124bc89a1f752c9 -->
## Sign in a user

> Example request:

```bash
curl -X POST "http://localhost/api/unauth/signIn" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"sGZIik1dWIFh08gk","password":"83daGrHvlNRvwaKM"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/signIn");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "sGZIik1dWIFh08gk",
    "password": "83daGrHvlNRvwaKM"
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
    "success": "true",
    "token": "6155cb365da1512356e99b6f8b5cb5757a28fb5baeae91503721fd201e61810be503e8167abad97c"
}
```
> Example response (404):

```json
{
    "success": "false",
    "error": "username and password don't matched"
}
```

### HTTP Request
`POST api/unauth/signIn`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    password | string |  required  | The password of the user.

<!-- END_3326cf80694aff2cc124bc89a1f752c9 -->

<!-- START_7bb46f44c88791cf906ead98dec97533 -->
## Signup a user

> Example request:

```bash
curl -X POST "http://localhost/api/unauth/signUp" \
    -H "Content-Type: application/json" \
    -d '{"my_username":"QwptS0Eq8D5Z5KZp","password":"eXVtOJmjBSrJneVk","confirm_password":"tDfOJmbGimCV8P5L","email":"JnY3vaurXqibV07A"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/signUp");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "my_username": "QwptS0Eq8D5Z5KZp",
    "password": "eXVtOJmjBSrJneVk",
    "confirm_password": "tDfOJmbGimCV8P5L",
    "email": "JnY3vaurXqibV07A"
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
    "success": "true",
    "token": "6155cb365da1512356e99b6f8b5cb5757a28fb5baeae91503721fd201e61810be503e8167abad97c"
}
```
> Example response (404):

```json
{
    "success": "false",
    "error": "username and password don't match"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "user is logged in already"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "email already exists"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username already exists"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "passwords mismatch"
}
```

### HTTP Request
`POST api/unauth/signUp`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    my_username | string |  required  | the username of the current user.
    password | string |  required  | The password of the user.
    confirm_password | string |  required  | The confirm password of the user.
    email | string |  required  | The email of the user.

<!-- END_7bb46f44c88791cf906ead98dec97533 -->

<!-- START_bc8fed275be3bfaa2a6eedef61e0dc26 -->
## Send Email to Reset Password [Under investigation]

> Example request:

```bash
curl -X POST "http://localhost/api/unauth/forgetPassword" \
    -H "Content-Type: application/json" \
    -d '{"email":"YJUHHxLDVCK9Tjsr"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/forgetPassword");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "YJUHHxLDVCK9Tjsr"
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
    "success": "true"
}
```
> Example response (404):

```json
{
    "success": "false",
    "error": "email doesn't exist"
}
```

### HTTP Request
`POST api/unauth/forgetPassword`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | The email of the user.

<!-- END_bc8fed275be3bfaa2a6eedef61e0dc26 -->

<!-- START_ff5252a2a0c9ebc5b68a7d349c3cd8c0 -->
## Reset User Password after receiving a mail [Under investigation]

> Example request:

```bash
curl -X POST "http://localhost/api/unauth/resetPassword" \
    -H "Content-Type: application/json" \
    -d '{"new_password":"D7TEa8Vsphkp6Os7","confirm_new_password":"Kf53FZedMJffSvXo"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/resetPassword");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "new_password": "D7TEa8Vsphkp6Os7",
    "confirm_new_password": "Kf53FZedMJffSvXo"
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
    "success": "true",
    "token": "6155cb365da1512356e99b6f8b5cb5757a28fb5baeae91503721fd201e61810be503e8167abad97c"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Passwords don't match"
}
```
> Example response (404):

```json
{
    "success": "false",
    "error": "Link expired"
}
```

### HTTP Request
`POST api/unauth/resetPassword`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    new_password | string |  required  | The new password of the user .
    confirm_new_password | string |  required  | The new password confirmation of the user .

<!-- END_ff5252a2a0c9ebc5b68a7d349c3cd8c0 -->

#Communities
all community features are handled by the following APIs
<!-- START_03db6e40e67431da1e4b4d77be361de4 -->
## Edit community rules or/and description.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/auth/editCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":7,"rules_content":"b9KOkWgfQuWXADIa","des_content":"lW4x83QqZTsUsRJW"}'

```

```javascript
const url = new URL("http://localhost/api/auth/editCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 7,
    "rules_content": "b9KOkWgfQuWXADIa",
    "des_content": "lW4x83QqZTsUsRJW"
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
}
```

### HTTP Request
`PATCH api/auth/editCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community the user want to edit its rules& description.
    rules_content | string |  required  | The edited rules of the community.
    des_content | string |  required  | The edited discription of the community.

<!-- END_03db6e40e67431da1e4b4d77be361de4 -->

<!-- START_423ebf50357e4010e3005269f1aea07d -->
## Create a community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/createCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_name":"XpTlgDYIIsFzrVWk"}'

```

```javascript
const url = new URL("http://localhost/api/auth/createCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_name": "XpTlgDYIIsFzrVWk"
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
    "success": "true"
}
```
> Example response (204):

```json
{
    "success": "false",
    "error": "some of the needed contents are missed"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "you have to complete 30 days "
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "this name already exists"
}
```

### HTTP Request
`POST api/auth/createCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_name | string |  required  | The Name of the community to be created.

<!-- END_423ebf50357e4010e3005269f1aea07d -->

<!-- START_2d40c194d773fb89e8383f5a0c25e2ba -->
## Remove an existing community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/removeCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":20}'

```

```javascript
const url = new URL("http://localhost/api/auth/removeCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 20
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
}
```

### HTTP Request
`DELETE api/auth/removeCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to be removed.

<!-- END_2d40c194d773fb89e8383f5a0c25e2ba -->

<!-- START_9a172571e6f52a7c8d92fe39a004f06f -->
## Add a moderator to a community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/addModerator" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":12,"mod_username":"5Nu90Wq78WeRvqfC"}'

```

```javascript
const url = new URL("http://localhost/api/auth/addModerator");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 12,
    "mod_username": "5Nu90Wq78WeRvqfC"
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
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "user doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "user is already a moderator in that community"
}
```

### HTTP Request
`POST api/auth/addModerator`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to add a moderator for.
    mod_username | string |  required  | The username of the moderator to be set for the community.

<!-- END_9a172571e6f52a7c8d92fe39a004f06f -->

<!-- START_9cfe84fef8716a2352294f5b683aaa4c -->
## Remove a moderator from a community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/removeModerator" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":6,"mod_username":"9dUVE78knTHsYPIy"}'

```

```javascript
const url = new URL("http://localhost/api/auth/removeModerator");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 6,
    "mod_username": "9dUVE78knTHsYPIy"
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "user doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "user isn't a moderator already in that community"
}
```

### HTTP Request
`DELETE api/auth/removeModerator`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to remove a moderator from.
    mod_username | string |  required  | The username of the moderator to be removed from the community.

<!-- END_9cfe84fef8716a2352294f5b683aaa4c -->

<!-- START_fe9703d357e06a738e2b8221312a839c -->
## Subscribe a community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/subscribeCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":4}'

```

```javascript
const url = new URL("http://localhost/api/auth/subscribeCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 4
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
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "user already is subscribed in that community"
}
```

### HTTP Request
`POST api/auth/subscribeCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to be un/subscribed.

<!-- END_fe9703d357e06a738e2b8221312a839c -->

<!-- START_876b196b4dffdfd4050c792ef33b684f -->
## Unsubscribe a community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/subscribeCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":1}'

```

```javascript
const url = new URL("http://localhost/api/auth/subscribeCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 1
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "user already is not subscribed in that community"
}
```

### HTTP Request
`DELETE api/auth/subscribeCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to be un/subscribed.

<!-- END_876b196b4dffdfd4050c792ef33b684f -->

<!-- START_2c1613bb279fcc1976917064b712fc07 -->
## View the communities which the user has subscribed

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/viewUserCommunities" \
    -H "Content-Type: application/json" \
    -d '{"username":"A20aUQxyBAbBX76M"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/viewUserCommunities");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "A20aUQxyBAbBX76M"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true",
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
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```

### HTTP Request
`GET api/unauth/viewUserCommunities`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the user who has the communities.

<!-- END_2c1613bb279fcc1976917064b712fc07 -->

<!-- START_3e81e368f9f489b339c704e1c18ad4be -->
## View rules and description of a specific community

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/communityRules" \
    -H "Content-Type: application/json" \
    -d '{"community_id":7}'

```

```javascript
const url = new URL("http://localhost/api/unauth/communityRules");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "community_id": 7
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
}
```

### HTTP Request
`GET api/unauth/communityRules`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community the user want to show its rules and  description.

<!-- END_3e81e368f9f489b339c704e1c18ad4be -->

#Following
<!-- START_ccdaeeb27930f362d9dc52d8bd41457b -->
## View User&#039;s Followers

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/followers" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"BbXkfGeopAfwKhMh"}'

```

```javascript
const url = new URL("http://localhost/api/auth/followers");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "BbXkfGeopAfwKhMh"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true",
    "follwersList": [
        "John Smith"
    ]
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```

### HTTP Request
`GET api/auth/followers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Username to show his followers

<!-- END_ccdaeeb27930f362d9dc52d8bd41457b -->

<!-- START_f700781e554299c355d61830d75e81a0 -->
## View Who User is Following

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/following" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"wxEkPMdLyLeS5wYP"}'

```

```javascript
const url = new URL("http://localhost/api/auth/following");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "wxEkPMdLyLeS5wYP"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true",
    "follwingList": [
        "John Smith",
        "John Kay"
    ]
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```

### HTTP Request
`GET api/auth/following`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Username to show his followering

<!-- END_f700781e554299c355d61830d75e81a0 -->

<!-- START_55d6ca855d9d056b6ecf2b90aad97fd3 -->
## Follow a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/follow" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"OGenV4b7oWTQO76d"}'

```

```javascript
const url = new URL("http://localhost/api/auth/follow");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "OGenV4b7oWTQO76d"
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
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Already following"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```

### HTTP Request
`POST api/auth/follow`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Username Want to follow.

<!-- END_55d6ca855d9d056b6ecf2b90aad97fd3 -->

<!-- START_2add768523e38391594c13409e2c13fb -->
## Unfollow a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/follow" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"8Vgf4b4UircKLOaE"}'

```

```javascript
const url = new URL("http://localhost/api/auth/follow");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "8Vgf4b4UircKLOaE"
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Already unfollowing"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```

### HTTP Request
`DELETE api/auth/follow`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Username Want to unfollow.

<!-- END_2add768523e38391594c13409e2c13fb -->

#Interacting Actions
posts , comments and anything related
<!-- START_fec7c4928bbbced52914728f12df0735 -->
## Save Post, Comment or Reply.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/saveLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":7}'

```

```javascript
const url = new URL("http://localhost/api/auth/saveLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 7
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
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "this post, comment or reply doesn't exist"
}
```

### HTTP Request
`POST api/auth/saveLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | The ID of the post/comment to be saved or unsaved.

<!-- END_fec7c4928bbbced52914728f12df0735 -->

<!-- START_c4234d0ffb6d82f3420eeb126d111e5d -->
## Unsave Post, Comment or Reply

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/saveLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":16}'

```

```javascript
const url = new URL("http://localhost/api/auth/saveLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 16
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "this post, comment or reply doesn't exist"
}
```

### HTTP Request
`DELETE api/auth/saveLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | The ID of the post/comment to be saved or unsaved.

<!-- END_c4234d0ffb6d82f3420eeb126d111e5d -->

<!-- START_852249fac82b4ffd44b4f83bf7cf156b -->
## Add new Link

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/addLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_content":"NeH5HkU8PlgnJ4qT","parent_link_id":15,"post_title":"BYAf2hszeOPQ4GJu","community_id":5,"image_path":"aSk4BZzb5CZSUyH8"}'

```

```javascript
const url = new URL("http://localhost/api/auth/addLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_content": "NeH5HkU8PlgnJ4qT",
    "parent_link_id": 15,
    "post_title": "BYAf2hszeOPQ4GJu",
    "community_id": 5,
    "image_path": "aSk4BZzb5CZSUyH8"
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
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post must have a title"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "post must have a content"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "parent doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
}
```

### HTTP Request
`POST api/auth/addLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_content | string |  required  | the content written in the post
    parent_link_id | integer |  required  | the ID of the parent link, this parameter should be 'null' if the link is a post
    post_title | string |  optional  | this parameter is not required only for posts
    community_id | integer |  optional  | this parameter is required only if the link is inside a community
    image_path | string |  optional  | if a post contains an image.

<!-- END_852249fac82b4ffd44b4f83bf7cf156b -->

<!-- START_91b9daa53d81bf9e0b76809894a5cf12 -->
## Pin or unpin a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/auth/pinPost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":7}'

```

```javascript
const url = new URL("http://localhost/api/auth/pinPost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 7
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post doesn't exist"
}
```

### HTTP Request
`PATCH api/auth/pinPost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to pin or unpin

<!-- END_91b9daa53d81bf9e0b76809894a5cf12 -->

<!-- START_6b332dbcf39f97a8cffe0f05f541ff2c -->
## Remove post, comment or reply.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/removeLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":6}'

```

```javascript
const url = new URL("http://localhost/api/auth/removeLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 6
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "this post, comment or reply doesn't exist"
}
```

### HTTP Request
`DELETE api/auth/removeLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | the ID of the link

<!-- END_6b332dbcf39f97a8cffe0f05f541ff2c -->

<!-- START_36b17ee7dcddc0f62d5f96c4be165df1 -->
## Hide a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/hidePost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":10}'

```

```javascript
const url = new URL("http://localhost/api/auth/hidePost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "already hidden"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post doesn't exist"
}
```

### HTTP Request
`POST api/auth/hidePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to hide

<!-- END_36b17ee7dcddc0f62d5f96c4be165df1 -->

<!-- START_4096829581148fe5f9cd1a2cd2fa4b7f -->
## Unhide a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/hidePost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":15}'

```

```javascript
const url = new URL("http://localhost/api/auth/hidePost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 15
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "already unhidden"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post doesn't exist"
}
```

### HTTP Request
`DELETE api/auth/hidePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to hide

<!-- END_4096829581148fe5f9cd1a2cd2fa4b7f -->

<!-- START_86c8750a7026719a977549da5fa8bf89 -->
## Edit a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/auth/editPost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":1,"new_title":"lEteywH1oWemZ3Qq","new_content":"wC1W9I9z2CVajNAp","new_image":"a16MDJO1qsiuUVZo"}'

```

```javascript
const url = new URL("http://localhost/api/auth/editPost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 1,
    "new_title": "lEteywH1oWemZ3Qq",
    "new_content": "wC1W9I9z2CVajNAp",
    "new_image": "a16MDJO1qsiuUVZo"
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post must have a title"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post must have a content"
}
```

### HTTP Request
`PATCH api/auth/editPost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to edit
    new_title | string |  optional  | the new title of the post
    new_content | string |  optional  | the new content of the post
    new_image | string |  optional  | the directory of the new image if there is .

<!-- END_86c8750a7026719a977549da5fa8bf89 -->

<!-- START_aaa3e5368de55f5371eef86ba9480062 -->
## Edit a comment

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/auth/editComment" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"comment_id":4,"new_content":"2O0YrNMpTn0GtwIj"}'

```

```javascript
const url = new URL("http://localhost/api/auth/editComment");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "comment_id": 4,
    "new_content": "2O0YrNMpTn0GtwIj"
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "comment doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "comment must have a content"
}
```

### HTTP Request
`PATCH api/auth/editComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    comment_id | integer |  required  | the id of the comment that the user wants to edit
    new_content | string |  optional  | the new content of the comment

<!-- END_aaa3e5368de55f5371eef86ba9480062 -->

<!-- START_6aa943d3a797b655e4d957bfc5595046 -->
## Add Downvote to a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/downVotePost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":5}'

```

```javascript
const url = new URL("http://localhost/api/auth/downVotePost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 5
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
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post doesn't exist"
}
```

### HTTP Request
`POST api/auth/downVotePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to downvote

<!-- END_6aa943d3a797b655e4d957bfc5595046 -->

<!-- START_e88748fbdc2ed848c25f511d96308db7 -->
## Remove Downvote from a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/downVotePost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":13}'

```

```javascript
const url = new URL("http://localhost/api/auth/downVotePost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 13
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post doesn't exist"
}
```

### HTTP Request
`DELETE api/auth/downVotePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to downvote

<!-- END_e88748fbdc2ed848c25f511d96308db7 -->

<!-- START_9492acf0039d12be5358182c2d33fa20 -->
## Add Downvote to a comment

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/downVoteComment" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"comment_id":2}'

```

```javascript
const url = new URL("http://localhost/api/auth/downVoteComment");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "comment_id": 2
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
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "comment doesn't exist"
}
```

### HTTP Request
`POST api/auth/downVoteComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    comment_id | integer |  required  | the id of the comment that the user wants to downvote

<!-- END_9492acf0039d12be5358182c2d33fa20 -->

<!-- START_10175d16ed6eb9802c465c00a852aa9c -->
## Remove Downvote from a comment

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/downVoteComment" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"comment_id":2}'

```

```javascript
const url = new URL("http://localhost/api/auth/downVoteComment");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "comment_id": 2
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "comment doesn't exist"
}
```

### HTTP Request
`DELETE api/auth/downVoteComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    comment_id | integer |  required  | the id of the comment that the user wants to downvote

<!-- END_10175d16ed6eb9802c465c00a852aa9c -->

<!-- START_458aa7a53dd4926b83e6809e96922d7e -->
## Add Upvote to a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/upVotePost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":18}'

```

```javascript
const url = new URL("http://localhost/api/auth/upVotePost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 18
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
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post doesn't exist"
}
```

### HTTP Request
`POST api/auth/upVotePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to downvote

<!-- END_458aa7a53dd4926b83e6809e96922d7e -->

<!-- START_163e0d7edcf99e485c67837f816ac6df -->
## Remove Upvote from a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/upVotePost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":14}'

```

```javascript
const url = new URL("http://localhost/api/auth/upVotePost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 14
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post doesn't exist"
}
```

### HTTP Request
`DELETE api/auth/upVotePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to downvote

<!-- END_163e0d7edcf99e485c67837f816ac6df -->

<!-- START_cadfb7fd8c176a6d5b5b623a2adb8f58 -->
## Add Upvote to a comment

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/upVoteComment" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"comment_id":9}'

```

```javascript
const url = new URL("http://localhost/api/auth/upVoteComment");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "comment_id": 9
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
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "comment doesn't exist"
}
```

### HTTP Request
`POST api/auth/upVoteComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    comment_id | integer |  required  | the id of the comment that the user wants to downvote

<!-- END_cadfb7fd8c176a6d5b5b623a2adb8f58 -->

<!-- START_d9ae157e84740549de866ecfecbc662e -->
## Remove Upvote from a comment

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/upVoteComment" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"comment_id":4}'

```

```javascript
const url = new URL("http://localhost/api/auth/upVoteComment");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "comment_id": 4
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
{
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "comment doesn't exist"
}
```

### HTTP Request
`DELETE api/auth/upVoteComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    comment_id | integer |  required  | the id of the comment that the user wants to downvote

<!-- END_d9ae157e84740549de866ecfecbc662e -->

<!-- START_86d421d08d268de104db5e3be6b1782a -->
## Viewing comments of a user on posts he/she has interacted with.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewComments" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"Mi1QuMMisEYjAqGi"}'

```

```javascript
const url = new URL("http://localhost/api/auth/viewComments");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "Mi1QuMMisEYjAqGi"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "comments": [
        {
            "comment_id": 1,
            "body": "comment1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 0,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "comment_id": 2,
            "body": "comment2",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 23,
            "upvotes": 17,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "false",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "comment_id": 3,
            "body": "comment3",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 31,
            "upvotes": 78,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "upvoted": "false",
            "downvoted": "false"
        }
    ]
}
```
> Example response (404):

```json
{
    "error": "somethimg wrong!!!!"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```

### HTTP Request
`GET api/auth/viewComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | if you visited another user profile this is his username.

<!-- END_86d421d08d268de104db5e3be6b1782a -->

<!-- START_f573b8826a3b9adf6bfce04e80913e16 -->
## View the upvoted posts of the user or the downvoted ones

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewUpOrDownvotedPosts" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"type":10}'

```

```javascript
const url = new URL("http://localhost/api/auth/viewUpOrDownvotedPosts");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "type": 10
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "posts": [
        {
            "post_id": 1,
            "body": "post1",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 17,
            "upvotes": 30,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "hidden": "false"
        },
        {
            "post_id": 2,
            "body": "post2",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "hidden": "false"
        },
        {
            "post_id": 3,
            "body": "post3",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "hidden": "false"
        }
    ]
}
```
> Example response (404):

```json
{
    "error": "somethimg wrong!!!!"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "undefined type"
}
```

### HTTP Request
`GET api/auth/viewUpOrDownvotedPosts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    type | integer |  required  | it is one for the upvoted posts and zero for the downvoted ones.

<!-- END_f573b8826a3b9adf6bfce04e80913e16 -->

<!-- START_4f77c128815baa7567768a35d9cd1341 -->
## View the overview of the user [Posts, comments, and links].

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewOverview" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"xwayV25GGYbGdrcI"}'

```

```javascript
const url = new URL("http://localhost/api/auth/viewOverview");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "xwayV25GGYbGdrcI"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "posts": [
        {
            "post_id": 1,
            "body": "post1",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 17,
            "upvotes": 30,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "hidden": "false",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "post_id": 2,
            "body": "post2",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "false",
            "hidden": "true",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "post_id": 3,
            "body": "post3",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "hidden": "true",
            "upvoted": "true",
            "downvoted": "false"
        }
    ],
    "comments": [
        {
            "comment_id": 1,
            "body": "comment1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 0,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "comment_id": 2,
            "body": "comment2",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 23,
            "upvotes": 17,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "false",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "comment_id": 3,
            "body": "comment3",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 31,
            "upvotes": 78,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "upvoted": "true",
            "downvoted": "false"
        }
    ]
}
```
> Example response (404):

```json
{
    "error": "something wrong!!!"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```

### HTTP Request
`GET api/auth/viewOverview`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | if you visited another user profile this is his username.

<!-- END_4f77c128815baa7567768a35d9cd1341 -->

<!-- START_27cc02800063c6e70dae5179f50b36bf -->
## View the saved Links by the user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewSavedLinks" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/auth/viewSavedLinks");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "posts": [
        {
            "post_id": 1,
            "body": "post1",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 17,
            "upvotes": 30,
            "date": " 2 days ago ",
            "comments_num": 0,
            "hidden": "false",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "post_id": 2,
            "body": "post2",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "comments_num": 0,
            "hidden": "true",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "post_id": 3,
            "body": "post3",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "comments_num": 0,
            "hidden": "true",
            "upvoted": "true",
            "downvoted": "false"
        }
    ],
    "comments": [
        {
            "comment_id": 1,
            "body": "comment1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 0,
            "date": " 2 days ago ",
            "comments_num": 0,
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "comment_id": 2,
            "body": "comment2",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 23,
            "upvotes": 17,
            "date": " 2 days ago ",
            "comments_num": 0,
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "comment_id": 3,
            "body": "comment3",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 31,
            "upvotes": 78,
            "date": " 2 days ago ",
            "comments_num": 0,
            "upvoted": "true",
            "downvoted": "false"
        }
    ]
}
```
> Example response (404):

```json
{
    "error": "somethimg wrong!!!!"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```

### HTTP Request
`GET api/auth/viewSavedLinks`


<!-- END_27cc02800063c6e70dae5179f50b36bf -->

<!-- START_84a5a9632e17b6b55498c323b0035bb6 -->
## Give Karma to a user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/giveReward" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"gl3PET2846DkoTMx"}'

```

```javascript
const url = new URL("http://localhost/api/auth/giveReward");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "gl3PET2846DkoTMx"
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
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Already given before"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```

### HTTP Request
`POST api/auth/giveReward`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Username to give to a reward.

<!-- END_84a5a9632e17b6b55498c323b0035bb6 -->

<!-- START_674c76e3d18904b323f9a1fbed72342c -->
## Upload an image

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/uploadImage" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"uploaded_image":"j6PdVjdVKREbqsIX"}'

```

```javascript
const url = new URL("http://localhost/api/auth/uploadImage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "uploaded_image": "j6PdVjdVKREbqsIX"
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
    "success": "true",
    "path": "sotrage\/app\/avatar.jpg"
}
```
> Example response (401):

```json
{
    "sucess": "false",
    "error": "UnAuthorized"
}
```
> Example response (401):

```json
{
    "sucess": "false",
    "error": "Unsupported media type"
}
```
> Example response (400):

```json
{
    "sucess": "false",
    "error": "Cannot upload the image"
}
```

### HTTP Request
`POST api/auth/uploadImage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    uploaded_image | file |  required  | Image to upload.

<!-- END_674c76e3d18904b323f9a1fbed72342c -->

<!-- START_edcae718190ed16d0233549f42881d85 -->
## Viewing the posts of a specific user or a community or both when you are on the home page.

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/ViewPosts" \
    -H "Content-Type: application/json" \
    -d '{"sort":"rDuXPUtwQApf5Bj5","username":"btrrEfUPkgmcUjko","community_id":8}'

```

```javascript
const url = new URL("http://localhost/api/unauth/ViewPosts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "sort": "rDuXPUtwQApf5Bj5",
    "username": "btrrEfUPkgmcUjko",
    "community_id": 8
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "posts": [
        {
            "post_id": 1,
            "body": "post1",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 17,
            "upvotes": 30,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "hidden": "false",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "post_id": 2,
            "body": "post2",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "false",
            "hidden": "true",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "post_id": 3,
            "body": "post3",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "hidden": "true",
            "upvoted": "true",
            "downvoted": "false"
        }
    ]
}
```
> Example response (404):

```json
{
    "error": "somethimg wrong!!!!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
}
```

### HTTP Request
`GET api/unauth/ViewPosts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    sort | string |  optional  | Choosing sorting type (New / Popular) [Default Popular]
    username | string |  optional  | if you visited another user profile this is his username [Default null=>guest / my username=>user].
    community_id | integer |  optional  | if you want to show the posts of a specific community this is its id [Default null].

<!-- END_edcae718190ed16d0233549f42881d85 -->

<!-- START_1cc48635a898d6e79adaa7887ec66b6b -->
## Viewing comments of a specific post or replies of a specific comment

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/viewCommentsReplies" \
    -H "Content-Type: application/json" \
    -d '{"link_id":20}'

```

```javascript
const url = new URL("http://localhost/api/unauth/viewCommentsReplies");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "link_id": 20
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "comments": [
        {
            "comment_id": 1,
            "body": "comment1",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 0,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "comment_id": 2,
            "body": "comment2",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 23,
            "upvotes": 17,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "false",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "comment_id": 3,
            "body": "comment3",
            "username": "ahmed",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 31,
            "upvotes": 78,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "upvoted": "true",
            "downvoted": "false"
        }
    ]
}
```
> Example response (404):

```json
{
    "error": "somethimg wrong!!!!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "this post, comment or reply doesn't exist"
}
```

### HTTP Request
`GET api/unauth/viewCommentsReplies`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | the id of the post or the id of the comment.

<!-- END_1cc48635a898d6e79adaa7887ec66b6b -->

<!-- START_b3c3d824135c9f9572665ac6374f5a02 -->
## Viewing a single post

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/viewSinglePost" \
    -H "Content-Type: application/json" \
    -d '{"post_id":17}'

```

```javascript
const url = new URL("http://localhost/api/unauth/viewSinglePost");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "post_id": 17
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "post_id": 1,
    "body": "post1",
    "image": "storage\/app\/avater.jpg",
    "title": "title1",
    "username": "ahmed",
    "photo_path": "storage\/app\/avater.jpg",
    "downvotes": 17,
    "upvotes": 30,
    "date": " 2 days ago ",
    "comments_num": 0,
    "saved": "true",
    "hidden": "false",
    "upvoted": "false",
    "downvoted": "true"
}
```
> Example response (404):

```json
{
    "error": "somethimg wrong!!!!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "id doesn't exist"
}
```

### HTTP Request
`GET api/unauth/viewSinglePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post.

<!-- END_b3c3d824135c9f9572665ac6374f5a02 -->

#Messages
<!-- START_a3866fe0c9a833e61357bd41e54fbc4d -->
## View the content of a specific message

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewUserMessage" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"message_id":11}'

```

```javascript
const url = new URL("http://localhost/api/auth/viewUserMessage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "message_id": 11
}

fetch(url, {
    method: "GET",
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
    "user_photo": "photo3",
    "message_content": "hello world"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "message doesn't exist"
}
```

### HTTP Request
`GET api/auth/viewUserMessage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    message_id | integer |  required  | the id of  the message that the user wants to see

<!-- END_a3866fe0c9a833e61357bd41e54fbc4d -->

<!-- START_39c9aed4a7b992d52b5db4f1f43dfdac -->
## View current user outbox messages

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewUserSentMessages" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/auth/viewUserSentMessages");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true",
    "messages": [
        {
            "reciever_name": "maged",
            "reciever_photo": "photo1",
            "message_content": "hello world",
            "message_id": "5"
        },
        {
            "reciever_name": "nour",
            "reciever_photo": "photo2",
            "message_content": "hello world tany",
            "message_id": "6"
        }
    ]
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```

### HTTP Request
`GET api/auth/viewUserSentMessages`


<!-- END_39c9aed4a7b992d52b5db4f1f43dfdac -->

<!-- START_f4d8c50aa2297f3004921b5a43b5bb25 -->
## View current user inbox Message

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewUserInboxMessages" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"state":13}'

```

```javascript
const url = new URL("http://localhost/api/auth/viewUserInboxMessages");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "state": 13
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true",
    "messages": [
        {
            "sender_name": "maged",
            "sender_photo": "photo1",
            "message_content": "hello world",
            "message_id": "1"
        },
        {
            "sender_name": "nour",
            "sender_photo": "photo2",
            "message_content": "hello world tany",
            "message_id": "3"
        }
    ]
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "undefined state"
}
```

### HTTP Request
`GET api/auth/viewUserInboxMessages`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    state | integer |  required  | 1 if unread messages ,2 if all messages,3 if notified messages

<!-- END_f4d8c50aa2297f3004921b5a43b5bb25 -->

<!-- START_1c2dc085d932a4d3ed3555745054136d -->
## Send a message to user from current user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/sendMessage" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"rec_username":"PfGroImLrkxpAnVR","msg_content":"058F6oSy4ArXjyLD"}'

```

```javascript
const url = new URL("http://localhost/api/auth/sendMessage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "rec_username": "PfGroImLrkxpAnVR",
    "msg_content": "058F6oSy4ArXjyLD"
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
    "success": "true"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "message must have a content"
}
```

### HTTP Request
`POST api/auth/sendMessage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    rec_username | string |  required  | The username of the reciever user.
    msg_content | string |  required  | The content of the message to be sent.

<!-- END_1c2dc085d932a4d3ed3555745054136d -->

#Notification
<!-- START_f720bbcb4e5e82168ae9a9d3435f6351 -->
## Check if there are new notifications fo the current user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/notification/check" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/auth/notification/check");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true",
    "number": 15
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```

### HTTP Request
`GET api/auth/notification/check`


<!-- END_f720bbcb4e5e82168ae9a9d3435f6351 -->

<!-- START_891b067704805ea0e1a0b034bf4da032 -->
## Return last 20 notifications for the current user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/notification/push" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/auth/notification/push");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true",
    "notifications": [
        "John has followed you",
        "Smith has posted a new post on his profile",
        "Mathew has posted a new post in BackEnd community",
        "Sam has mentioned you"
    ]
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```

### HTTP Request
`GET api/auth/notification/push`


<!-- END_891b067704805ea0e1a0b034bf4da032 -->

#Privacy settings
<!-- START_be7fc64a0aa69cf9b0967d89e3c5d561 -->
## Show current user blocklist

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/blockedUsers" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/auth/blockedUsers");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true",
    "blockedList": [
        "John Smith"
    ]
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```

### HTTP Request
`GET api/auth/blockedUsers`


<!-- END_be7fc64a0aa69cf9b0967d89e3c5d561 -->

<!-- START_c527621f70dad2e8f1bae3f5b3cc4575 -->
## Block a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/blockingUsers" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"NZ0few4Cqp2NVLef"}'

```

```javascript
const url = new URL("http://localhost/api/auth/blockingUsers");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "NZ0few4Cqp2NVLef"
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
    "sucess": "true"
}
```
> Example response (401):

```json
{
    "sucess": "true",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "sucess": "true",
    "error": "Already blocked"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```

### HTTP Request
`POST api/auth/blockingUsers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the user being blocked

<!-- END_c527621f70dad2e8f1bae3f5b3cc4575 -->

<!-- START_996839456288cc353bfd9f6567f5bf59 -->
## Unblock a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/auth/blockingUsers" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"0ha7BqSHHIvbKqEg"}'

```

```javascript
const url = new URL("http://localhost/api/auth/blockingUsers");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "0ha7BqSHHIvbKqEg"
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
{
    "sucess": "true"
}
```
> Example response (401):

```json
{
    "sucess": "true",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "sucess": "true",
    "error": "Already unblocked"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```

### HTTP Request
`DELETE api/auth/blockingUsers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the user being unblocked

<!-- END_996839456288cc353bfd9f6567f5bf59 -->

#Searching
<!-- START_0f4b030572180f70ac4811706078f762 -->
## Search for a community or a user

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/search" \
    -H "Content-Type: application/json" \
    -d '{"search_content":"shNd51MPqJc9k6Fv"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "search_content": "shNd51MPqJc9k6Fv"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "usersContent": [
        "johnsmith",
        "stevenkay"
    ],
    "communityContent": [
        "Ahly",
        "BackEnd"
    ]
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "search content is empty"
}
```

### HTTP Request
`GET api/unauth/search`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    search_content | string |  required  | The string the user searching for.

<!-- END_0f4b030572180f70ac4811706078f762 -->

#User Information
<!-- START_b148d8fae4a198cdbc7dd7f4a488aa94 -->
## Show user&#039;s private information

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewPrivateUserInfo" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/auth/viewPrivateUserInfo");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true",
    "email": "john_bb@gmail"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```

### HTTP Request
`GET api/auth/viewPrivateUserInfo`


<!-- END_b148d8fae4a198cdbc7dd7f4a488aa94 -->

<!-- START_04225283fb39b5b7bc7411b813cfe4bf -->
## Show user&#039;s public information

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewPublicUserInfo" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"AvaYcmQrgrbK1KQK"}'

```

```javascript
const url = new URL("http://localhost/api/auth/viewPublicUserInfo");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "AvaYcmQrgrbK1KQK"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": "true",
    "username": "john",
    "karma": 500,
    "cake_day": "March 8, 2019",
    "about": "be or not to be",
    "photo_path": "storage\/app\/avater.jpg"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username doesn't exist"
}
```

### HTTP Request
`GET api/auth/viewPublicUserInfo`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | username to show his public info

<!-- END_04225283fb39b5b7bc7411b813cfe4bf -->

<!-- START_b2cae4bf872b83fb4aee3b7740d06aae -->
## show the profile image

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewAvatar" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"cokiKewYbxDzbWWI"}'

```

```javascript
const url = new URL("http://localhost/api/auth/viewAvatar");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "cokiKewYbxDzbWWI"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "photo_path": "storage\/app\/avatar.jpg"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```

### HTTP Request
`GET api/auth/viewAvatar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | username to show his avatar

<!-- END_b2cae4bf872b83fb4aee3b7740d06aae -->


