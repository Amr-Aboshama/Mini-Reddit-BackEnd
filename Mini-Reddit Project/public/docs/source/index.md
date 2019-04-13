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
<!-- START_fb955c4796315027ad6b2fa378a6fdc6 -->
## Delete current user account

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/deleteMyAccount" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"password":"EPHszW5iGdPLoCab"}'

```

```javascript
const url = new URL("http://localhost/api/auth/deleteMyAccount");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "password": "EPHszW5iGdPLoCab"
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
    "error": "password isn't correct"
}
```

### HTTP Request
`POST api/auth/deleteMyAccount`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    password | string |  required  | the password of te current user

<!-- END_fb955c4796315027ad6b2fa378a6fdc6 -->

<!-- START_a066651329044f2d5ecb79a31945e0da -->
## Change current user password

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/auth/changePassword" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"password":"FRCSPrVsJOowCAh0","new_password":"vEAeyV2Rb856REL2","confirm_new_password":"apsuA6p3t9aVXVzK"}'

```

```javascript
const url = new URL("http://localhost/api/auth/changePassword");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "password": "FRCSPrVsJOowCAh0",
    "new_password": "vEAeyV2Rb856REL2",
    "confirm_new_password": "apsuA6p3t9aVXVzK"
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
`PATCH api/auth/changePassword`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    password | string |  required  | the current password of the current user
    new_password | string |  required  | the new password of the current user
    confirm_new_password | string |  required  | the new password of the current user

<!-- END_a066651329044f2d5ecb79a31945e0da -->

<!-- START_dfd1f84709d37e78da0a09b0dde49ae3 -->
## Update current user Displayed Name

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/auth/updateDisplayName" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"name":"yVckc9ITZJPqx77u"}'

```

```javascript
const url = new URL("http://localhost/api/auth/updateDisplayName");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "name": "yVckc9ITZJPqx77u"
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
> Example response (400):

```json
{
    "success": "false",
    "error": "you are trying to update with the old value"
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
    -d '{"about":"D9DseqM7iRj6Vhje"}'

```

```javascript
const url = new URL("http://localhost/api/auth/updateAbout");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "about": "D9DseqM7iRj6Vhje"
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
> Example response (400):

```json
{
    "success": "false",
    "error": "you are trying to update with the old value"
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
    "error": "no about is written"
}
```

### HTTP Request
`PATCH api/auth/updateAbout`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    about | string |  required  | the content of about to be updated to

<!-- END_27bac20603448461f03965177b89d240 -->

<!-- START_54936a26e59a000204b04cb07e52753c -->
## Update user profile image or cover image

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/updateCoverAndProfileImage" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"profile_image":"ls3zDB59ZQoakTTS","profile_or_cover":6}'

```

```javascript
const url = new URL("http://localhost/api/auth/updateCoverAndProfileImage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "profile_image": "ls3zDB59ZQoakTTS",
    "profile_or_cover": 6
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
    "path": "storage\/app\/avatars\/avatar.jpg"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "Unsupported media type"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "photo is not categorized neither profile nor cover photo"
}
```

### HTTP Request
`POST api/auth/updateCoverAndProfileImage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    profile_image | file |  required  | User's new profile image.
    profile_or_cover | integer |  required  | 1 for profile 2 for cover.

<!-- END_54936a26e59a000204b04cb07e52753c -->

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
    "error": "UnAuthorized"
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
    -d '{"username":"xEoYgjQ3ScMBrBGi","password":"uBX1vxS8OQADgmk7"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/signIn");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "xEoYgjQ3ScMBrBGi",
    "password": "uBX1vxS8OQADgmk7"
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
> Example response (422):

```json
{
    "success": "false",
    "error": "Invalid or some data missed"
}
```

### HTTP Request
`POST api/unauth/signIn`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the current user.
    password | string |  required  | The password of the user.

<!-- END_3326cf80694aff2cc124bc89a1f752c9 -->

<!-- START_7bb46f44c88791cf906ead98dec97533 -->
## Signup a user

> Example request:

```bash
curl -X POST "http://localhost/api/unauth/signUp" \
    -H "Content-Type: application/json" \
    -d '{"username":"t5Wkd9bL5qwu8Qa6","password":"CEId4fZUxQoO06Oc","password_confirmation":"etx4eFTd3w6WYKl3","email":"BNdcZXD3HhF1Dwae"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/signUp");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "t5Wkd9bL5qwu8Qa6",
    "password": "CEId4fZUxQoO06Oc",
    "password_confirmation": "etx4eFTd3w6WYKl3",
    "email": "BNdcZXD3HhF1Dwae"
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
> Example response (422):

```json
{
    "success": "false",
    "error": "Invalid or some data missed"
}
```

### HTTP Request
`POST api/unauth/signUp`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the current user.
    password | string |  required  | The password of the user.
    password_confirmation | string |  required  | The confirm password of the user.
    email | string |  required  | The email of the user.

<!-- END_7bb46f44c88791cf906ead98dec97533 -->

<!-- START_bc8fed275be3bfaa2a6eedef61e0dc26 -->
## Send Email to Reset Password [Under investigation]

> Example request:

```bash
curl -X POST "http://localhost/api/unauth/forgetPassword" \
    -H "Content-Type: application/json" \
    -d '{"email":"z0RYXum9hiWI0KsS"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/forgetPassword");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "z0RYXum9hiWI0KsS"
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
    -d '{"new_password":"0CvPC1MnMgcC4QDf","confirm_new_password":"QQqUiTPI4vpJg65D"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/resetPassword");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "new_password": "0CvPC1MnMgcC4QDf",
    "confirm_new_password": "QQqUiTPI4vpJg65D"
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
<!-- START_9f6f4e4dabe420fe51a72a3b00335a19 -->
## Edit community rules or/and description.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/editCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":7,"rules_content":"j0T2psft7JI8DUnA","des_content":"xfKosvrWD0tGZHFj","banner":"PbMOYNjbJLUdPtwO","logo":"pcs5PEeToZasLScm"}'

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
    "rules_content": "j0T2psft7JI8DUnA",
    "des_content": "xfKosvrWD0tGZHFj",
    "banner": "PbMOYNjbJLUdPtwO",
    "logo": "pcs5PEeToZasLScm"
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
    "error": "this user is not a moderator"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "unvalid logo"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "unvalid banner"
}
```

### HTTP Request
`POST api/auth/editCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community the user want to edit its rules& description.
    rules_content | string |  required  | The edited rules of the community.
    des_content | string |  required  | The edited discription of the community.
    banner | file |  required  | The banner of the community.
    logo | file |  required  | The logo of the community.

<!-- END_9f6f4e4dabe420fe51a72a3b00335a19 -->

<!-- START_423ebf50357e4010e3005269f1aea07d -->
## Create a community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/createCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_name":"6UyITmttCziSYEpY"}'

```

```javascript
const url = new URL("http://localhost/api/auth/createCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_name": "6UyITmttCziSYEpY"
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
    "community_id": 5
}
```
> Example response (403):

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

<!-- START_c252c2289522b311fafcb463ecfffaaf -->
## Remove an existing community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/removeCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":10}'

```

```javascript
const url = new URL("http://localhost/api/auth/removeCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 10
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
    "error": "this user is not a moderator"
}
```

### HTTP Request
`POST api/auth/removeCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to be removed.

<!-- END_c252c2289522b311fafcb463ecfffaaf -->

<!-- START_9a172571e6f52a7c8d92fe39a004f06f -->
## Add a moderator to a community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/addModerator" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":13,"moderator_username":"ZU9XogXG7NLdSP51"}'

```

```javascript
const url = new URL("http://localhost/api/auth/addModerator");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 13,
    "moderator_username": "ZU9XogXG7NLdSP51"
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
    moderator_username | string |  required  | The username of the moderator to be set for the community.

<!-- END_9a172571e6f52a7c8d92fe39a004f06f -->

<!-- START_dcb0ad58c9cdad6f432f6e12beb4779d -->
## Remove a moderator from a community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/removeModerator" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":1,"moderator_username":"7WfoylwxPOni8c6O"}'

```

```javascript
const url = new URL("http://localhost/api/auth/removeModerator");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 1,
    "moderator_username": "7WfoylwxPOni8c6O"
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
    "error": "user isn't a moderator already in that community"
}
```

### HTTP Request
`POST api/auth/removeModerator`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to remove a moderator from.
    moderator_username | string |  required  | The username of the moderator to be removed from the community.

<!-- END_dcb0ad58c9cdad6f432f6e12beb4779d -->

<!-- START_fe9703d357e06a738e2b8221312a839c -->
## Subscribe a community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/subscribeCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":2}'

```

```javascript
const url = new URL("http://localhost/api/auth/subscribeCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 2
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

<!-- START_fb4e96f4ebc57cbe7334830d3b73931e -->
## Unsubscribe a community

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/unSubscribeCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":10}'

```

```javascript
const url = new URL("http://localhost/api/auth/unSubscribeCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 10
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
    "error": "user already is not subscribed in that community"
}
```

### HTTP Request
`POST api/auth/unSubscribeCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to be un/subscribed.

<!-- END_fb4e96f4ebc57cbe7334830d3b73931e -->

<!-- START_2c1613bb279fcc1976917064b712fc07 -->
## View the communities which the user has subscribed

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/viewUserCommunities" \
    -H "Content-Type: application/json" \
    -d '{"username":"WyVOe1A5PBYJf8Db"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/viewUserCommunities");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "WyVOe1A5PBYJf8Db"
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
            "community_id": 5
        },
        {
            "community_id": 10
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

<!-- START_dd12f7cd4b0cdde7e4b6650101645efc -->
## View information of a specific community

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/communityInformation" \
    -H "Content-Type: application/json" \
    -d '{"community_id":"p0sbWFKBzOWWvXec"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/communityInformation");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "community_id": "p0sbWFKBzOWWvXec"
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
    "name": "Potterheads",
    "rules": "You shouldn't post a harmful posts",
    "desription": "This Community is for Potterheads",
    "num_subscribes": 30,
    "banner": "storage\/app\/banner.jpg",
    "logo": "storage\/app\/logo.jpg",
    "subscribed": "false"
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
`GET api/unauth/communityInformation`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | id |  required  | The ID of the community the user want to show its rules and  description.

<!-- END_dd12f7cd4b0cdde7e4b6650101645efc -->

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
    -d '{"username":"c8XO7AXNS7vjOknR"}'

```

```javascript
const url = new URL("http://localhost/api/auth/followers");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "c8XO7AXNS7vjOknR"
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
        "john-smith"
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
    -d '{"username":"7XM7TEvmbyHhgY4T"}'

```

```javascript
const url = new URL("http://localhost/api/auth/following");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "7XM7TEvmbyHhgY4T"
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
        "john_smith",
        "john-kay"
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
    -d '{"username":"CYrIHHomtqWeiIQN"}'

```

```javascript
const url = new URL("http://localhost/api/auth/follow");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "CYrIHHomtqWeiIQN"
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

<!-- START_e188d5b7be3b8faacdc7875bdbf1f85e -->
## Unfollow a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/unfollow" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"i17RnZI3UycEG94X"}'

```

```javascript
const url = new URL("http://localhost/api/auth/unfollow");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "i17RnZI3UycEG94X"
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
`POST api/auth/unfollow`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Username Want to unfollow.

<!-- END_e188d5b7be3b8faacdc7875bdbf1f85e -->

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
    -d '{"link_id":18}'

```

```javascript
const url = new URL("http://localhost/api/auth/saveLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 18
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

<!-- START_412bc91cb0a80764cd3fc4d4472eab56 -->
## Unsave Post, Comment or Reply

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/unsaveLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":13}'

```

```javascript
const url = new URL("http://localhost/api/auth/unsaveLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 13
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
`POST api/auth/unsaveLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | The ID of the post/comment to be saved or unsaved.

<!-- END_412bc91cb0a80764cd3fc4d4472eab56 -->

<!-- START_852249fac82b4ffd44b4f83bf7cf156b -->
## Add new Link

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/addLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_content":"juMFxqqgSg9NSECK","parent_link_id":15,"post_title":"ZxyoiScBefEnlqpC","community_id":2,"image_path":"qZIewwOalxXzrQj5","video_url":"nPwnIbcYpT3UdYlZ"}'

```

```javascript
const url = new URL("http://localhost/api/auth/addLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_content": "juMFxqqgSg9NSECK",
    "parent_link_id": 15,
    "post_title": "ZxyoiScBefEnlqpC",
    "community_id": 2,
    "image_path": "qZIewwOalxXzrQj5",
    "video_url": "nPwnIbcYpT3UdYlZ"
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
    video_url | string |  optional  | if a post contains a video.

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
    -d '{"post_id":15}'

```

```javascript
const url = new URL("http://localhost/api/auth/pinPost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 15
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
    "error": "The post doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post_id is required"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Only posts can be pinned"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "There is something went wrong!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "The user can pin only his own posts!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Only moderators can pin posts in the community!"
}
```

### HTTP Request
`PATCH api/auth/pinPost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to pin or unpin

<!-- END_91b9daa53d81bf9e0b76809894a5cf12 -->

<!-- START_899b7785dab86f03b9b38c9ead479b99 -->
## Remove post, comment or reply.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/removeLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":11}'

```

```javascript
const url = new URL("http://localhost/api/auth/removeLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 11
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
    "error": "link_id is required"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "The link doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "There is something went wrong!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Only the moderator of the community or the author of the link can remove it."
}
```

### HTTP Request
`POST api/auth/removeLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | the ID of the link

<!-- END_899b7785dab86f03b9b38c9ead479b99 -->

<!-- START_36b17ee7dcddc0f62d5f96c4be165df1 -->
## Hide a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/hidePost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":6}'

```

```javascript
const url = new URL("http://localhost/api/auth/hidePost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 6
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
    "error": "The post doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Only posts can be hidden"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "There is something went wrong!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post_id is required"
}
```

### HTTP Request
`POST api/auth/hidePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to hide

<!-- END_36b17ee7dcddc0f62d5f96c4be165df1 -->

<!-- START_6921c7ac73ec879ae7db025283031598 -->
## Unhide a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/unhidePost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":15}'

```

```javascript
const url = new URL("http://localhost/api/auth/unhidePost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 15
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
    "error": "Only posts can be unhidden!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "post_id is required"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Only hidden posts can be unhidden!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "There is something went wrong!"
}
```

### HTTP Request
`POST api/auth/unhidePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to hide

<!-- END_6921c7ac73ec879ae7db025283031598 -->

<!-- START_86c8750a7026719a977549da5fa8bf89 -->
## Edit a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/auth/editPost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":14,"new_title":"P8AfmiaT070Q0oqx","new_content":"KsfT1y9xSW0eOiWO","new_image":"dviD9TXOhxILRXPQ"}'

```

```javascript
const url = new URL("http://localhost/api/auth/editPost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 14,
    "new_title": "P8AfmiaT070Q0oqx",
    "new_content": "KsfT1y9xSW0eOiWO",
    "new_image": "dviD9TXOhxILRXPQ"
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
    -d '{"comment_id":12,"new_content":"9jwr6tMXv7lmYZTx"}'

```

```javascript
const url = new URL("http://localhost/api/auth/editComment");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "comment_id": 12,
    "new_content": "9jwr6tMXv7lmYZTx"
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

<!-- START_21c0f0392f688f23b849c42f0ae878fd -->
## Upvote Link

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/upvoteLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":4}'

```

```javascript
const url = new URL("http://localhost/api/auth/upvoteLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 4
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
    "error": "link_id doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "link_id is required"
}
```

### HTTP Request
`POST api/auth/upvoteLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | the id of the post that the user wants to downvote

<!-- END_21c0f0392f688f23b849c42f0ae878fd -->

<!-- START_90257d45d2242d53590a7222d7736e58 -->
## Add Downvote to a post

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/downvoteLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":11}'

```

```javascript
const url = new URL("http://localhost/api/auth/downvoteLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 11
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
    "error": "There is something went wrong!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "link_id is required"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "The Link doesn't exist"
}
```

### HTTP Request
`POST api/auth/downvoteLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | the id of the post that the user wants to downvote

<!-- END_90257d45d2242d53590a7222d7736e58 -->

<!-- START_f573b8826a3b9adf6bfce04e80913e16 -->
## View the upvoted posts of the user or the downvoted ones

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewUpOrDownvotedPosts" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"type":18}'

```

```javascript
const url = new URL("http://localhost/api/auth/viewUpOrDownvotedPosts");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "type": 18
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
            "video_url": "https:\/\/www.youtube.com",
            "title": "title1",
            "username": "ahmed",
            "community": "none",
            "community_id": -1,
            "subscribed": "true",
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
            "video_url": "https:\/\/www.youtube.com",
            "title": "title1",
            "username": "ahmed",
            "community": "none",
            "community_id": -1,
            "subscribed": "false",
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
            "video_url": "https:\/\/www.youtube.com",
            "title": "title1",
            "username": "ahmed",
            "community": "laravel",
            "community_id": 1,
            "subscribed": "true",
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
    -d '{"username":"MVTbD0sWASO1XBlK"}'

```

```javascript
const url = new URL("http://localhost/api/auth/viewOverview");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "MVTbD0sWASO1XBlK"
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
            "community": "none",
            "subscribed": "false",
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
            "community": "none",
            "subscribed": "false",
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
            "community": "laravel",
            "subscribed": "true",
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
[
    {
        "type": "comment",
        "post": {
            "title": "post1",
            "post_id": 1,
            "body": "amro post1",
            "community_id": -1,
            "author_username": "amro"
        },
        "comments": [
            {
                "comment_id": 15,
                "author_username": "ahmed",
                "body": "reply on comment2 on post1",
                "link_date": "2019-04-08 00:07:00",
                "upvotes": 20,
                "downvotes": 26,
                "upvoted": "true",
                "downvoted": "false"
            }
        ]
    },
    {
        "body": "amro post2",
        "title": "post2",
        "upvotes": 0,
        "downvotes": 0,
        "post_id": 2,
        "community_id": 1,
        "community": "laravel",
        "subscribed": "true",
        "upvoted": "false",
        "downvoted": "false",
        "post_image": "app.storage.koko.jpg",
        "video_url": "app.storage.videomp4",
        "comments_num": 1,
        "hidden": "false",
        "type": "post"
    },
    {
        "body": "ahmed post1",
        "title": "post1",
        "upvotes": 0,
        "downvotes": 0,
        "post_id": 4,
        "community_id": -1,
        "community": "none",
        "subscribed": "false",
        "upvoted": "false",
        "downvoted": "false",
        "post_image": -1,
        "video_url": -1,
        "comments_num": 1,
        "hidden": "false",
        "type": "post"
    },
    {
        "type": "comment",
        "post": {
            "title": "post1",
            "post_id": 1,
            "body": "ahmed post1",
            "community_id": -1,
            "author_username": "ahmed"
        },
        "comments": [
            {
                "comment_id": 13,
                "body": "comment on post4",
                "author_username": "amro",
                "link_date": "2019-04-08 00:07:00",
                "upvotes": 20,
                "downvotes": 26,
                "upvoted": "true",
                "downvoted": "false"
            },
            {
                "comment_id": 22,
                "author_username": "menna",
                "body": "comment on post4",
                "link_date": "2019-04-08 00:07:00",
                "upvotes": 20,
                "downvotes": 26,
                "upvoted": "true",
                "downvoted": "false"
            }
        ]
    }
]
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

<!-- START_a3530892d5e3e0ccd46bfd2ad33eb9e1 -->
## Viewing the hidden posts of the user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/viewHiddenPosts" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/auth/viewHiddenPosts");

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
            "video_url": "https:\/\/www.youtube.com",
            "title": "title1",
            "username": "ahmed",
            "community": "laravel",
            "subscribed": "true",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 17,
            "upvotes": 30,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "post_id": 2,
            "body": "post2",
            "image": "storage\/app\/avater.jpg",
            "video_url": "https:\/\/www.youtube.com",
            "title": "title1",
            "username": "ahmed",
            "community": "none",
            "subscribed": "false",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "false",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "post_id": 3,
            "body": "post3",
            "image": "storage\/app\/avater.jpg",
            "video_url": "https:\/\/www.youtube.com",
            "title": "title1",
            "username": "ahmed",
            "community": "none",
            "subscribed": "false",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
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
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized"
}
```

### HTTP Request
`GET api/auth/viewHiddenPosts`


<!-- END_a3530892d5e3e0ccd46bfd2ad33eb9e1 -->

<!-- START_84a5a9632e17b6b55498c323b0035bb6 -->
## Give Karma to a user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/giveReward" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"bA1nRoeQf3mumE9H"}'

```

```javascript
const url = new URL("http://localhost/api/auth/giveReward");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "bA1nRoeQf3mumE9H"
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
    -d '{"uploaded_image":"uN07X5TcW4rw0hJQ"}'

```

```javascript
const url = new URL("http://localhost/api/auth/uploadImage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "uploaded_image": "uN07X5TcW4rw0hJQ"
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
    "success": "false",
    "error": "UnAuthorized"
}
```
> Example response (401):

```json
{
    "success": "false",
    "error": "Unsupported media type"
}
```
> Example response (400):

```json
{
    "success": "false",
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
## Viewing the posts of a specific user or a community or both when you are on the home page or the popular page.

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/ViewPosts" \
    -H "Content-Type: application/json" \
    -d '{"page_type":9,"username":"eE5AwESEFB0zhFo7","community_id":14}'

```

```javascript
const url = new URL("http://localhost/api/unauth/ViewPosts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page_type": 9,
    "username": "eE5AwESEFB0zhFo7",
    "community_id": 14
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
            "video_url": "https:\/\/www.youtube.com",
            "image": "storage\/app\/avater.jpg",
            "title": "title1",
            "username": "ahmed",
            "community": "laravel",
            "community_id": 1,
            "subscribed": "true",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 17,
            "upvotes": 30,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "hidden": "false",
            "upvoted": "true",
            "downvoted": "false",
            "pinned": 1
        },
        {
            "post_id": 2,
            "body": "post2",
            "image": "storage\/app\/avater.jpg",
            "video_url": "https:\/\/www.youtube.com",
            "title": "title1",
            "username": "ahmed",
            "community": "none",
            "community_id": null,
            "subscribed": "false",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "false",
            "hidden": "true",
            "upvoted": "true",
            "downvoted": "false",
            "pinned": 0
        },
        {
            "post_id": 3,
            "body": "post3",
            "image": "storage\/app\/avater.jpg",
            "video_url": "https:\/\/www.youtube.com",
            "title": "title1",
            "username": "ahmed",
            "community": "none",
            "community_id": null,
            "subscribed": "false",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "comments_num": 0,
            "saved": "true",
            "hidden": "true",
            "upvoted": "true",
            "downvoted": "false",
            "pinned": 1
        }
    ]
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Something Wrong!!!"
}
```

### HTTP Request
`GET api/unauth/ViewPosts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page_type | integer |  optional  | home or popular (1 for home , -1 for popular)
    username | string |  optional  | if you visited another user profile this is his username [Default null=>guest / my username=>user].
    community_id | integer |  optional  | if you want to show the posts of a specific community this is its id [Default null].

<!-- END_edcae718190ed16d0233549f42881d85 -->

<!-- START_c6253b8ad80cdaa856097b30169b6467 -->
## Viewing comments of a user on posts he/she has interacted with.

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/viewComments" \
    -H "Content-Type: application/json" \
    -d '{"username":"9mhVpsWgwVNLv7Kg"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/viewComments");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "9mhVpsWgwVNLv7Kg"
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
[
    {
        "post": {
            "post_id": 1,
            "body": "post1",
            "title": "post",
            "author_username": "ahmed",
            "community": " laravel",
            "community_id": 1
        },
        "comments": [
            {
                "comment_id": 55,
                "body": "comment1 on post1",
                "date": "2 days ago",
                "upvotes": 12,
                "downvotes": 45,
                "upvoted": "true",
                "downvoted": "false"
            },
            {
                "comment_id": 59,
                "body": "comment2 on post1",
                "date": "3 days ago",
                "upvotes": 12,
                "downvotes": 45,
                "upvoted": "true",
                "downvoted": "false"
            }
        ]
    },
    {
        "post": {
            "post_id": 7,
            "body": "post2",
            "title": "post",
            "author_username": "ahmed",
            "community": " laravel",
            "community_id": 1
        },
        "comments": [
            {
                "comment_id": 40,
                "body": "comment1 on post2",
                "date": "2 days ago",
                "upvotes": 12,
                "downvotes": 45,
                "upvoted": "true",
                "downvoted": "false"
            },
            {
                "comment_id": 89,
                "body": "comment2 on post2",
                "date": "3 days ago",
                "upvotes": 12,
                "downvotes": 45,
                "upvoted": "true",
                "downvoted": "false"
            },
            {
                "comment_id": 79,
                "body": "comment3 on post2",
                "date": "3 days ago",
                "upvotes": 12,
                "downvotes": 45,
                "upvoted": "true",
                "downvoted": "false"
            }
        ]
    },
    {
        "post": {
            "body": "post1",
            "title": "post",
            "author_username": "ahmed",
            "community": " laravel",
            "community_id": 1
        },
        "commments": [
            {
                "comment_id": 80,
                "body": "comment1 on post3",
                "date": "2 days ago",
                "upvotes": 12,
                "downvotes": 45,
                "upvoted": "true",
                "downvoted": "false"
            }
        ]
    }
]
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username is required"
}
```

### HTTP Request
`GET api/unauth/viewComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | username of the user you wanna see his/her comments on posts.

<!-- END_c6253b8ad80cdaa856097b30169b6467 -->

<!-- START_1cc48635a898d6e79adaa7887ec66b6b -->
## Viewing comments of a specific post or replies of a specific comment

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/viewCommentsReplies" \
    -H "Content-Type: application/json" \
    -d '{"link_id":10}'

```

```javascript
const url = new URL("http://localhost/api/unauth/viewCommentsReplies");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "link_id": 10
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
    -d '{"post_id":1}'

```

```javascript
const url = new URL("http://localhost/api/unauth/viewSinglePost");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "post_id": 1
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
    "community": "none",
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
    -d '{"message_id":5}'

```

```javascript
const url = new URL("http://localhost/api/auth/viewUserMessage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "message_id": 5
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
    -d '{"state":15}'

```

```javascript
const url = new URL("http://localhost/api/auth/viewUserInboxMessages");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "state": 15
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
    -d '{"rec_username":"WMYsRc0uJhYOwFf4","msg_content":"U8L66JeAxNfFALV8"}'

```

```javascript
const url = new URL("http://localhost/api/auth/sendMessage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "rec_username": "WMYsRc0uJhYOwFf4",
    "msg_content": "U8L66JeAxNfFALV8"
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
<!-- START_f07c390d554ff547461bfdffb6b99c2a -->
## Check if there are new notifications fo the current user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/checkNotification" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/auth/checkNotification");

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
`GET api/auth/checkNotification`


<!-- END_f07c390d554ff547461bfdffb6b99c2a -->

<!-- START_aa55ab33f0c01ab82c60c2148e4a7def -->
## Return last 20 notifications for the current user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/pushNotification" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/auth/pushNotification");

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
`GET api/auth/pushNotification`


<!-- END_aa55ab33f0c01ab82c60c2148e4a7def -->

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
        "john-smith"
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

<!-- START_e73fa36ef8a7088995ce793582c73ebc -->
## Block a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/blockUser" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"ssmTpEsBuKkZaCy4"}'

```

```javascript
const url = new URL("http://localhost/api/auth/blockUser");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "ssmTpEsBuKkZaCy4"
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
`POST api/auth/blockUser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the user being blocked

<!-- END_e73fa36ef8a7088995ce793582c73ebc -->

<!-- START_8599abaf71212530bab0c370ba1b576a -->
## Unblock a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/auth/unblockUser" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"hDWSz7oX9YSqhG7k"}'

```

```javascript
const url = new URL("http://localhost/api/auth/unblockUser");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "hDWSz7oX9YSqhG7k"
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
`POST api/auth/unblockUser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the user being unblocked

<!-- END_8599abaf71212530bab0c370ba1b576a -->

#Searching
<!-- START_0f4b030572180f70ac4811706078f762 -->
## Search for a community or a user

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/search" \
    -H "Content-Type: application/json" \
    -d '{"search_content":"WriUeZ6Uyw1E950u"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "search_content": "WriUeZ6Uyw1E950u"
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
    "usernames": [
        "johnsmith",
        "stevenkay"
    ],
    "community_IDs": [
        1,
        5
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

<!-- START_eed3f30d6d0993a5e57e1d28092a53d7 -->
## Show user&#039;s username

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/auth/getUsername" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/auth/getUsername");

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
    "username": "john"
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
`GET api/auth/getUsername`


<!-- END_eed3f30d6d0993a5e57e1d28092a53d7 -->

<!-- START_6a0485e3dc9ad38ceaf3c5165a1becf9 -->
## Show user&#039;s public information

> Example request:

```bash
curl -X GET -G "http://localhost/api/unauth/viewPublicUserInfo" \
    -H "Content-Type: application/json" \
    -d '{"username":"dAVgpQMTF5E3iJXz"}'

```

```javascript
const url = new URL("http://localhost/api/unauth/viewPublicUserInfo");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "dAVgpQMTF5E3iJXz"
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
    "name": "John Smith",
    "karma": 500,
    "cake_day": "March 8, 2019",
    "about": "be or not to be",
    "photo_path": "storage\/app\/avater.jpg",
    "cover_path": "storage\/app\/bannar.jpg"
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
`GET api/unauth/viewPublicUserInfo`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | username to show his public info

<!-- END_6a0485e3dc9ad38ceaf3c5165a1becf9 -->


