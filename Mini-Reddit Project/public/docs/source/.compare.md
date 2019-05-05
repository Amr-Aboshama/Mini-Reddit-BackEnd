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
<!-- START_1c973e0a782a370513dc10d368761913 -->
## Delete current user account.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/deleteMyAccount" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"password":"corrupti"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/deleteMyAccount");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "password": "corrupti"
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
`POST api/v1/auth/deleteMyAccount`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    password | string |  required  | the password of te current user

<!-- END_1c973e0a782a370513dc10d368761913 -->

<!-- START_d9b4390ebf3806b5f1d8ac0a6fe7bfc6 -->
## Change current user password.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/v1/auth/changePassword" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"password":"excepturi","new_password":"nihil","confirm_new_password":"occaecati"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/changePassword");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "password": "excepturi",
    "new_password": "nihil",
    "confirm_new_password": "occaecati"
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
`PATCH api/v1/auth/changePassword`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    password | string |  required  | the current password of the current user
    new_password | string |  required  | the new password of the current user
    confirm_new_password | string |  required  | the new password of the current user

<!-- END_d9b4390ebf3806b5f1d8ac0a6fe7bfc6 -->

<!-- START_eecb81a2f90e13853a54d20347844ac5 -->
## Update current user Displayed Name.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/v1/auth/updateDisplayName" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"name":"excepturi"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/updateDisplayName");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "name": "excepturi"
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
`PATCH api/v1/auth/updateDisplayName`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The new name of user to update.

<!-- END_eecb81a2f90e13853a54d20347844ac5 -->

<!-- START_a0877b223516b1e59a1b0ea267f5a478 -->
## Update current user About.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/v1/auth/updateAbout" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"about":"perspiciatis"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/updateAbout");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "about": "perspiciatis"
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
`PATCH api/v1/auth/updateAbout`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    about | string |  required  | the content of about to be updated to

<!-- END_a0877b223516b1e59a1b0ea267f5a478 -->

<!-- START_d56cc28e4df23b342a635e29feba24a1 -->
## Update user profile image or cover image.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/updateCoverAndProfileImage" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"profile_image":"nisi","profile_or_cover":19}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/updateCoverAndProfileImage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "profile_image": "nisi",
    "profile_or_cover": 19
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
    "path": "storage\/avatars\/username-time-avatar.jpg"
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
`POST api/v1/auth/updateCoverAndProfileImage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    profile_image | file |  required  | User's new profile image.
    profile_or_cover | integer |  required  | 1 for profile 2 for cover.

<!-- END_d56cc28e4df23b342a635e29feba24a1 -->

#Authentication
sign in , sign up .....etc
<!-- START_c592c810c8094dad18210d757efc925c -->
## Sign Out a user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/signOut" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/v1/auth/signOut");

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
`POST api/v1/auth/signOut`


<!-- END_c592c810c8094dad18210d757efc925c -->

<!-- START_b7731610d21c3c0901e5911ef6569fef -->
## Sign in a user.

> Example request:

```bash
curl -X POST "http://localhost/api/v1/unauth/signIn" \
    -H "Content-Type: application/json" \
    -d '{"username":"delectus","password":"commodi"}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/signIn");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "delectus",
    "password": "commodi"
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
`POST api/v1/unauth/signIn`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the current user.
    password | string |  required  | The password of the user.

<!-- END_b7731610d21c3c0901e5911ef6569fef -->

<!-- START_5cc24078e8dcd606cd1ccbba32f58b40 -->
## Signup a user.

> Example request:

```bash
curl -X POST "http://localhost/api/v1/unauth/signUp" \
    -H "Content-Type: application/json" \
    -d '{"username":"aperiam","password":"quisquam","password_confirmation":"corrupti","email":"et"}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/signUp");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "aperiam",
    "password": "quisquam",
    "password_confirmation": "corrupti",
    "email": "et"
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
`POST api/v1/unauth/signUp`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the current user.
    password | string |  required  | The password of the user.
    password_confirmation | string |  required  | The confirm password of the user.
    email | string |  required  | The email of the user.

<!-- END_5cc24078e8dcd606cd1ccbba32f58b40 -->

<!-- START_007dc1ffce3e715e57541c6677781151 -->
## Send Email to Reset Password.

> Example request:

```bash
curl -X POST "http://localhost/api/v1/unauth/forgetPassword" \
    -H "Content-Type: application/json" \
    -d '{"email":"quae"}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/forgetPassword");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "quae"
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
`POST api/v1/unauth/forgetPassword`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | The email of the user.

<!-- END_007dc1ffce3e715e57541c6677781151 -->

<!-- START_7e79ebd85978e2c3794f3bc645ec6fa5 -->
## Reset User Password after receiving a mail.

> Example request:

```bash
curl -X POST "http://localhost/api/v1/unauth/resetPassword/1" \
    -H "Content-Type: application/json" \
    -d '{"new_password":"labore","password_confirmation":"aspernatur"}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/resetPassword/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "new_password": "labore",
    "password_confirmation": "aspernatur"
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
    "error": "Link is wrong or expired"
}
```

### HTTP Request
`POST api/v1/unauth/resetPassword/{hash}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    new_password | string |  required  | The new password of the user .
    password_confirmation | string |  required  | The new password confirmation of the user .

<!-- END_7e79ebd85978e2c3794f3bc645ec6fa5 -->

#Communities
all community features are handled by the following APIs
<!-- START_f65dc7f20da16c157ccdbfb2562ac771 -->
## Edit community rules or/and description.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/editCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":11,"rules_content":"accusantium","banner":"praesentium","des_content":"debitis","logo":"ad"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/editCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 11,
    "rules_content": "accusantium",
    "banner": "praesentium",
    "des_content": "debitis",
    "logo": "ad"
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
> Example response (403):

```json
{
    "success": "false",
    "error": "invalid logo"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "invalid banner"
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
`POST api/v1/auth/editCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community the user want to edit its rules& description.
    rules_content | string |  required  | The edited rules of the community.
    banner | file |  required  | The banner of the community.
    des_content | string |  required  | The edited discription of the community.
    logo | file |  required  | The logo of the community.

<!-- END_f65dc7f20da16c157ccdbfb2562ac771 -->

<!-- START_a7df6661bcf60a8b73c4aae32d6b1848 -->
## Create a community.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/createCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_name":"qui"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/createCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_name": "qui"
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
> Example response (401):

```json
{
    "success": "false",
    "error": "UnAuthorized "
}
```
> Example response (403):

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
> Example response (422):

```json
{
    "success": "false",
    "error": "Invalid or some data missed"
}
```

### HTTP Request
`POST api/v1/auth/createCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_name | string |  required  | The Name of the community to be created.

<!-- END_a7df6661bcf60a8b73c4aae32d6b1848 -->

<!-- START_b1700bb28df56a40a80ad31aa566a8fa -->
## Remove an existing community.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/removeCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":18}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/removeCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 18
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
> Example response (422):

```json
{
    "success": "false",
    "error": "Invalid or some data missed"
}
```

### HTTP Request
`POST api/v1/auth/removeCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to be removed.

<!-- END_b1700bb28df56a40a80ad31aa566a8fa -->

<!-- START_46daae9deb351cd06252c160ec3523e8 -->
## Add a moderator to a community.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/addModerator" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":1,"moderator_username":"dignissimos"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/addModerator");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 1,
    "moderator_username": "dignissimos"
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
> Example response (403):

```json
{
    "success": "false",
    "error": "you are not a modirator to add another modirator"
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
`POST api/v1/auth/addModerator`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to add a moderator for.
    moderator_username | string |  required  | The username of the moderator to be set for the community.

<!-- END_46daae9deb351cd06252c160ec3523e8 -->

<!-- START_2bdab99e74dafb70ef3f928c383dff46 -->
## Remove a moderator from a community.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/removeModerator" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":7,"moderator_username":"et"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/removeModerator");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 7,
    "moderator_username": "et"
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
> Example response (403):

```json
{
    "success": "false",
    "error": "you are not a modirator to remove another modirator"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "there is no moderators except you"
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
`POST api/v1/auth/removeModerator`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to remove a moderator from.
    moderator_username | string |  required  | The username of the moderator to be removed from the community.

<!-- END_2bdab99e74dafb70ef3f928c383dff46 -->

<!-- START_7b97ba3a2205c349f93c3b3734dfcc63 -->
## Subscribe a community.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/subscribeCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":17}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/subscribeCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 17
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
> Example response (422):

```json
{
    "success": "false",
    "error": "Invalid or some data missed"
}
```

### HTTP Request
`POST api/v1/auth/subscribeCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to be un/subscribed.

<!-- END_7b97ba3a2205c349f93c3b3734dfcc63 -->

<!-- START_28af56fdde6f649c32ee5a56b76eb49d -->
## Unsubscribe a community.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/unSubscribeCommunity" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"community_id":12}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/unSubscribeCommunity");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "community_id": 12
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
> Example response (422):

```json
{
    "success": "false",
    "error": "Invalid or some data missed"
}
```

### HTTP Request
`POST api/v1/auth/unSubscribeCommunity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to be un/subscribed.

<!-- END_28af56fdde6f649c32ee5a56b76eb49d -->

<!-- START_3e9970db303c3fa20811add0100e2e71 -->
## view moderators of a specific community.

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/unauth/viewModerators" \
    -H "Content-Type: application/json" \
    -d '{"community_id":10}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/viewModerators");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "community_id": 10
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
    "moderators": [
        {
            "moderator_username": "nour",
            "moderator_photo": "storage\/app\/photo2.jpg"
        },
        {
            "moderator_username": "ahmed",
            "moderator_photo": "storage\/app\/photo1.jpg"
        }
    ]
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
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
`GET api/v1/unauth/viewModerators`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | integer |  required  | The ID of the community to view its modirators.

<!-- END_3e9970db303c3fa20811add0100e2e71 -->

<!-- START_ca1d8d7d8dfbd42998340672e1d0b8c7 -->
## View the communities which the user has subscribed.

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/unauth/viewUserCommunities" \
    -H "Content-Type: application/json" \
    -d '{"username":"sit"}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/viewUserCommunities");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "sit"
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
            "community_id": 5,
            "community_name": "logic",
            "community_logo": "storage\/app\/logo1.jpg"
        },
        {
            "community_id": 10,
            "community_name": "micro",
            "communtiy_logo": "storage\/app\/logo2.jpg"
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
> Example response (422):

```json
{
    "success": "false",
    "error": "Invalid or some data missed"
}
```

### HTTP Request
`GET api/v1/unauth/viewUserCommunities`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the user who has the communities.

<!-- END_ca1d8d7d8dfbd42998340672e1d0b8c7 -->

<!-- START_6736c4036bbe81ad4b399bc8bb217c0a -->
## View information of a specific community.

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/unauth/communityInformation" \
    -H "Content-Type: application/json" \
    -d '{"community_id":"facere"}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/communityInformation");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "community_id": "facere"
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
    "subscribed": "false",
    "moderator": "true"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "community doesn't exist"
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
`GET api/v1/unauth/communityInformation`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    community_id | id |  required  | The ID of the community the user want to show its rules and  description.

<!-- END_6736c4036bbe81ad4b399bc8bb217c0a -->

#Following
<!-- START_9d250ffc40bb62fb7d34d932c2654a8f -->
## View User&#039;s Followers.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/followers" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"enim"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/followers");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "enim"
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
`GET api/v1/auth/followers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Username to show his followers

<!-- END_9d250ffc40bb62fb7d34d932c2654a8f -->

<!-- START_30fb95e31f426ce193f4df2f51e6ed32 -->
## View Who User is Following.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/following" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"hic"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/following");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "hic"
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
`GET api/v1/auth/following`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Username to show his followering

<!-- END_30fb95e31f426ce193f4df2f51e6ed32 -->

<!-- START_258fe082d4a4c92220fbc7176487f1cd -->
## Follow a user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/follow" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"est"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/follow");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "est"
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
`POST api/v1/auth/follow`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Username Want to follow.

<!-- END_258fe082d4a4c92220fbc7176487f1cd -->

<!-- START_2180986aace641d6cf1e8116e80e7c8c -->
## Unfollow a user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/unfollow" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"ea"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/unfollow");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "ea"
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
`POST api/v1/auth/unfollow`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Username Want to unfollow.

<!-- END_2180986aace641d6cf1e8116e80e7c8c -->

#Interacting Actions
posts , comments and anything related
<!-- START_fb16aa9b60701d5b2bc005ad92799645 -->
## Save Post, Comment or Reply.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/saveLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":15}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/saveLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 15
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
> Example response (403):

```json
{
    "success": "false",
    "error": "already saved"
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
`POST api/v1/auth/saveLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | The ID of the post/comment to be saved or unsaved.

<!-- END_fb16aa9b60701d5b2bc005ad92799645 -->

<!-- START_7810956564ac8a6315fbc57dc5e341f7 -->
## Unsave Post, Comment or Reply.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/unsaveLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":15}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/unsaveLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 15
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
> Example response (403):

```json
{
    "success": "false",
    "error": "already unsaved"
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
`POST api/v1/auth/unsaveLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | The ID of the post/comment to be saved or unsaved.

<!-- END_7810956564ac8a6315fbc57dc5e341f7 -->

<!-- START_56c9990cff719c9183daacf5245d955e -->
## Add new Link.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/addLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_content":"dolore","parent_link_id":4,"post_title":"laboriosam","community_id":12,"image_path":"iste","video_url":"cumque"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/addLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_content": "dolore",
    "parent_link_id": 4,
    "post_title": "laboriosam",
    "community_id": 12,
    "image_path": "iste",
    "video_url": "cumque"
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
    "link_id": 3
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
    "error": "There are some missing or invalid data!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Only moderators or subscribers can post in the community"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "The post you are replying on isn't in the sent community!"
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
`POST api/v1/auth/addLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_content | string |  required  | the content written in the post
    parent_link_id | integer |  optional  | the ID of the parent link, this parameter is required only if the link isn't a post
    post_title | string |  optional  | this parameter is required only for posts
    community_id | integer |  optional  | this parameter is required only if the link is inside a community
    image_path | string |  optional  | if a post contains an image.
    video_url | string |  optional  | if a post contains a video.

<!-- END_56c9990cff719c9183daacf5245d955e -->

<!-- START_f2cca647462916f2a424dae5a6031a4e -->
## Pin or unpin a post.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/v1/auth/pinPost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":20}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/pinPost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 20
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
`PATCH api/v1/auth/pinPost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to pin or unpin

<!-- END_f2cca647462916f2a424dae5a6031a4e -->

<!-- START_40020123d5fc1b51c4f6d740b5afd8f9 -->
## Remove post, comment or reply.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/removeLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":12}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/removeLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 12
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
`POST api/v1/auth/removeLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | the ID of the link

<!-- END_40020123d5fc1b51c4f6d740b5afd8f9 -->

<!-- START_ebf278b671039bfcc9995cfae930d0a5 -->
## Hide a post.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/hidePost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":11}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/hidePost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 11
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
`POST api/v1/auth/hidePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to hide

<!-- END_ebf278b671039bfcc9995cfae930d0a5 -->

<!-- START_0a641b0313fbe0acb724ee8c77854e81 -->
## Unhide a post.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/unhidePost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":16}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/unhidePost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 16
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
`POST api/v1/auth/unhidePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to hide

<!-- END_0a641b0313fbe0acb724ee8c77854e81 -->

<!-- START_447ad603be18f1c3f27d503ff6a961bf -->
## Edit a post.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/v1/auth/editPost" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"post_id":14,"new_title":"fuga","new_content":"molestiae","new_image":"sint","new_video_url":"ea"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/editPost");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "post_id": 14,
    "new_title": "fuga",
    "new_content": "molestiae",
    "new_image": "sint",
    "new_video_url": "ea"
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
    "error": "There are some missing or invalid data!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Only the author of the post can edit it"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "There are something went wrong!"
}
```

### HTTP Request
`PATCH api/v1/auth/editPost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post that the user wants to edit
    new_title | string |  optional  | the new title of the post
    new_content | string |  optional  | the new content of the post
    new_image | string |  optional  | the directory of the new image if there is .
    new_video_url | string |  optional  | the url of the new video if there is .

<!-- END_447ad603be18f1c3f27d503ff6a961bf -->

<!-- START_297abb60998134f5b5f7172b4dfdec65 -->
## Edit a comment.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/v1/auth/editComment" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"comment_id":17,"new_content":"consequatur"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/editComment");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "comment_id": 17,
    "new_content": "consequatur"
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
    "error": "comment\/reply doesn't exist"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "There are some missing or invalid data!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "Only the author of the comment\/reply can edit it"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "There are something went wrong!"
}
```

### HTTP Request
`PATCH api/v1/auth/editComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    comment_id | integer |  required  | the id of the comment that the user wants to edit
    new_content | string |  optional  | the new content of the comment

<!-- END_297abb60998134f5b5f7172b4dfdec65 -->

<!-- START_5aaafab4a0cafbeb78d7cd9e1977acc0 -->
## Upvote Link.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/upvoteLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":9}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/upvoteLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 9
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
`POST api/v1/auth/upvoteLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | the id of the post that the user wants to downvote

<!-- END_5aaafab4a0cafbeb78d7cd9e1977acc0 -->

<!-- START_79a77e28b1909f35b0b0df38e7bb7156 -->
## Add Downvote to a post.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/downvoteLink" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"link_id":5}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/downvoteLink");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "link_id": 5
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
`POST api/v1/auth/downvoteLink`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | the id of the post that the user wants to downvote

<!-- END_79a77e28b1909f35b0b0df38e7bb7156 -->

<!-- START_974c8f332d2cb22521dd6217e4519a32 -->
## View the upvoted posts of the user or the downvoted ones.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/viewUpOrDownvotedPosts" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"type":13}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/viewUpOrDownvotedPosts");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "type": 13
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
            "duration": "2 weeks",
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
            "duration": "2 weeks",
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
            "duration": "2 weeks",
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
`GET api/v1/auth/viewUpOrDownvotedPosts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    type | integer |  required  | it is one for the upvoted posts and zero for the downvoted ones.

<!-- END_974c8f332d2cb22521dd6217e4519a32 -->

<!-- START_aa74c11981dfd17484b74f80f7f389d7 -->
## View the saved Links by the user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/viewSavedLinks" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/v1/auth/viewSavedLinks");

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
            "duration": "1 min ago",
            "community_id": 3,
            "author_username": "amro",
            "community": "gogo",
            "subscribed": "true"
        },
        "comments": [
            {
                "comment_id": 15,
                "author_username": "ahmed",
                "body": "reply on comment2 on post1",
                "link_date": "2019-04-08 00:07:00",
                "duration": "1 min ago",
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
        "type": "post",
        "duration": "1 min ago"
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
        "type": "post",
        "duration": "1 min ago"
    },
    {
        "type": "comment",
        "post": {
            "title": "post1",
            "post_id": 1,
            "body": "ahmed post1",
            "duration": "1 min ago",
            "community_id": -1,
            "author_username": "ahmed",
            "community": "none",
            "subscribed": "false"
        },
        "comments": [
            {
                "comment_id": 13,
                "body": "comment on post4",
                "author_username": "amro",
                "link_date": "2019-04-08 00:07:00",
                "duration": "1 min ago",
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
                "duration": "1 min ago",
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
`GET api/v1/auth/viewSavedLinks`


<!-- END_aa74c11981dfd17484b74f80f7f389d7 -->

<!-- START_fb541e901971335b16e6213bbbdeead4 -->
## Viewing the hidden posts of the user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/viewHiddenPosts" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/v1/auth/viewHiddenPosts");

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
            "community_id": 1,
            "subscribed": "true",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 17,
            "upvotes": 30,
            "date": " 2 days ago ",
            "duration": "1 min ago",
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
            "community_id": -1,
            "subscribed": "false",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "duration": "1 min ago",
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
            "community_id": -1,
            "subscribed": "false",
            "author_photo_path": "storage\/app\/avater.jpg",
            "downvotes": 15,
            "upvotes": 20,
            "date": " 2 days ago ",
            "duration": "1 min ago",
            "comments_num": 0,
            "saved": "true",
            "upvoted": "true",
            "downvoted": "false"
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
`GET api/v1/auth/viewHiddenPosts`


<!-- END_fb541e901971335b16e6213bbbdeead4 -->

<!-- START_1a3eead1267011c2450e4584b61c887c -->
## Upload an image.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/uploadImage" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"uploaded_image":"nobis"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/uploadImage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "uploaded_image": "nobis"
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
> Example response (403):

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
`POST api/v1/auth/uploadImage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    uploaded_image | file |  required  | Image to upload.

<!-- END_1a3eead1267011c2450e4584b61c887c -->

<!-- START_5c2f8744bde73cfd08415a572e6c10de -->
## View the overview of the user [Posts, comments, and links].

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/unauth/viewOverview" \
    -H "Content-Type: application/json" \
    -d '{"username":"labore"}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/viewOverview");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "labore"
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
        "type": "comment",
        "post": {
            "title": "post1",
            "post_id": 1,
            "body": "amro post1",
            "duration": "2 weeks",
            "community_id": -1,
            "author_username": "amro",
            "community": "none",
            "subscribed": "false"
        },
        "comments": [
            {
                "comment_id": 15,
                "author_username": "ahmed",
                "body": "reply on comment2 on post1",
                "link_date": "2019-04-08 00:07:00",
                "duration": "2 weeks",
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
        "saved": "true",
        "type": "post",
        "duration": "2 weeks"
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
        "saved": "true",
        "type": "post",
        "duration": "2 weeks"
    },
    {
        "type": "comment",
        "post": {
            "title": "post1",
            "post_id": 1,
            "body": "ahmed post1",
            "duration": "2 weeks",
            "community_id": -1,
            "author_username": "ahmed",
            "community": "none",
            "subscribed": "false"
        },
        "comments": [
            {
                "comment_id": 13,
                "body": "comment on post4",
                "author_username": "amro",
                "link_date": "2019-04-08 00:07:00",
                "duration": "2 weeks",
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
                "duration": "1 month ago",
                "upvotes": 20,
                "downvotes": 26,
                "upvoted": "true",
                "downvoted": "false"
            }
        ]
    }
]
```
> Example response (404):

```json
{
    "error": "something wrong!!!"
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "username is required"
}
```

### HTTP Request
`GET api/v1/unauth/viewOverview`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | if you visited another user profile this is his username.

<!-- END_5c2f8744bde73cfd08415a572e6c10de -->

<!-- START_6c8617b53d818acc6e369459735025ad -->
## Viewing the posts of a specific user or a community or both when you are on the home page or the popular page.

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/unauth/ViewPosts" \
    -H "Content-Type: application/json" \
    -d '{"page_type":19,"username":"itaque","community_id":17}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/ViewPosts");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page_type": 19,
    "username": "itaque",
    "community_id": 17
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
            "duration": "1 month ago",
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
            "duration": "1 month ago",
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
            "duration": "1 month ago",
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
`GET api/v1/unauth/ViewPosts`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page_type | integer |  optional  | home or popular (1 for home , -1 for popular)
    username | string |  optional  | if you visited another user profile this is his username [Default null=>guest / my username=>user].
    community_id | integer |  optional  | if you want to show the posts of a specific community this is its id [Default null].

<!-- END_6c8617b53d818acc6e369459735025ad -->

<!-- START_f09de0db34a81e4d9199fd5ef260f04e -->
## Viewing comments of a user on posts he/she has interacted with.

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/unauth/viewComments" \
    -H "Content-Type: application/json" \
    -d '{"username":"itaque"}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/viewComments");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "itaque"
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
            "duration": "2 weeks",
            "community": " laravel",
            "community_id": 1,
            "subscribed": "true"
        },
        "comments": [
            {
                "comment_id": 55,
                "body": "comment1 on post1",
                "date": "2 days ago",
                "duration": "2 weeks",
                "upvotes": 12,
                "downvotes": 45,
                "upvoted": "true",
                "downvoted": "false"
            },
            {
                "comment_id": 59,
                "body": "comment2 on post1",
                "date": "3 days ago",
                "duration": "2 weeks",
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
            "duration": "2 weeks",
            "community": " laravel",
            "community_id": 1,
            "subscribed": "true"
        },
        "comments": [
            {
                "comment_id": 40,
                "body": "comment1 on post2",
                "date": "2 days ago",
                "duration": "2 weeks",
                "upvotes": 12,
                "downvotes": 45,
                "upvoted": "true",
                "downvoted": "false"
            },
            {
                "comment_id": 89,
                "body": "comment2 on post2",
                "date": "3 days ago",
                "duration": "2 weeks",
                "upvotes": 12,
                "downvotes": 45,
                "upvoted": "true",
                "downvoted": "false"
            },
            {
                "comment_id": 79,
                "body": "comment3 on post2",
                "date": "3 days ago",
                "duration": "2 weeks",
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
            "duration": "2 weeks",
            "community": " laravel",
            "community_id": 1,
            "subscribed": "true"
        },
        "commments": [
            {
                "comment_id": 80,
                "body": "comment1 on post3",
                "date": "2 days ago",
                "duration": "2 weeks",
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
`GET api/v1/unauth/viewComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | username of the user you wanna see his/her comments on posts.

<!-- END_f09de0db34a81e4d9199fd5ef260f04e -->

<!-- START_47570e346f8b81010ed088d918f7036a -->
## Viewing comments of a specific post or replies of a specific comment.

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/unauth/viewCommentsReplies" \
    -H "Content-Type: application/json" \
    -d '{"link_id":15}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/viewCommentsReplies");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "link_id": 15
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
            "link_id": 1,
            "content": "comment1",
            "author_username": "ahmed",
            "downvotes": 15,
            "upvotes": 0,
            "link_date": " 2 days ago ",
            "duration": "2 weeks",
            "comments_num": 0,
            "saved": "true",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "link_id": 2,
            "content": "comment2",
            "author_username": "ahmed",
            "downvotes": 23,
            "upvotes": 17,
            "link_date": " 2 days ago ",
            "duration": "2 weeks",
            "comments_num": 0,
            "saved": "false",
            "upvoted": "true",
            "downvoted": "false"
        },
        {
            "link_id": 3,
            "content": "comment3",
            "author_username": "ahmed",
            "downvotes": 31,
            "upvotes": 78,
            "link_date": " 2 days ago ",
            "duration": "2 weeks",
            "comments_num": 0,
            "saved": "true",
            "upvoted": "true",
            "downvoted": "false"
        }
    ]
}
```
> Example response (403):

```json
{
    "success": "false",
    "error": "the link_id is required"
}
```

### HTTP Request
`GET api/v1/unauth/viewCommentsReplies`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    link_id | integer |  required  | the id of the post or the id of the comment.

<!-- END_47570e346f8b81010ed088d918f7036a -->

<!-- START_5c6f52c0fab558b085e46e6e0ebe28f4 -->
## Viewing a single post.

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/unauth/viewSinglePost" \
    -H "Content-Type: application/json" \
    -d '{"post_id":1}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/viewSinglePost");

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
    "video_url": "storage\/app\/avater.jpg",
    "title": "title1",
    "username": "ahmed",
    "community": "none",
    "community_id": -1,
    "author_photo_path": "storage\/app\/avater.jpg",
    "downvotes": 17,
    "upvotes": 30,
    "date": " 2 days ago ",
    "duration": "1 min ago",
    "comments_num": 0,
    "saved": "true",
    "hidden": "false",
    "upvoted": "false",
    "downvoted": "true"
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
`GET api/v1/unauth/viewSinglePost`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    post_id | integer |  required  | the id of the post.

<!-- END_5c6f52c0fab558b085e46e6e0ebe28f4 -->

#Messages
<!-- START_4a32485d49a9d66f6a1123e5ead6a918 -->
## View the content of a specific message.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/viewUserMessage" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"message_id":1}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/viewUserMessage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "message_id": 1
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
    "message_subject": "hello world",
    "message_content": "hello world",
    "duration": "1 min ago"
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
`GET api/v1/auth/viewUserMessage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    message_id | integer |  required  | the id of  the message that the user wants to see

<!-- END_4a32485d49a9d66f6a1123e5ead6a918 -->

<!-- START_7294953eee5c67d1cdfd64eca6cb88db -->
## View current user outbox messages.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/viewUserSentMessages" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/v1/auth/viewUserSentMessages");

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
            "receiver_name": "maged",
            "receiver_photo": "photo1",
            "message_subject": "hello world",
            "message_content": "hello world",
            "message_id": "5",
            "duration": "1 min ago"
        },
        {
            "receiver_name": "nour",
            "receiver_photo": "photo2",
            "message_subject": "hello world tany",
            "message_content": "hello world tany",
            "message_id": "6",
            "duration": "1 min ago"
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
`GET api/v1/auth/viewUserSentMessages`


<!-- END_7294953eee5c67d1cdfd64eca6cb88db -->

<!-- START_67464f15980838dcf7b142aac43084d6 -->
## View current user inbox Message.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/viewUserInboxMessages" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"state":19}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/viewUserInboxMessages");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "state": 19
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
            "message_subject": "hello world",
            "message_content": "hello world",
            "message_id": "1",
            "duration": "1 min ago"
        },
        {
            "sender_name": "nour",
            "sender_photo": "photo2",
            "message_subject": "hello world",
            "message_content": "hello world tany",
            "message_id": "3",
            "duration": "1 min ago"
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
> Example response (403):

```json
{
    "success": "false",
    "error": "state does not exist"
}
```

### HTTP Request
`GET api/v1/auth/viewUserInboxMessages`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    state | integer |  required  | 1 if unread messages ,2 if read messages ,3 if all messages

<!-- END_67464f15980838dcf7b142aac43084d6 -->

<!-- START_9fa610e386eb2bb3d947984c4c260659 -->
## Send a message to user from current user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/sendMessage" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"rec_username":"excepturi","msg_content":"ipsa","msg_subject":"ut"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/sendMessage");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "rec_username": "excepturi",
    "msg_content": "ipsa",
    "msg_subject": "ut"
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
> Example response (403):

```json
{
    "success": "false",
    "error": "message must have a subject"
}
```

### HTTP Request
`POST api/v1/auth/sendMessage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    rec_username | string |  required  | The username of the reciever user.
    msg_content | string |  required  | The content of the message to be sent.
    msg_subject | string |  required  | The subject of the message to be sent.

<!-- END_9fa610e386eb2bb3d947984c4c260659 -->

#Notification
<!-- START_2f1ab999a7700805bdd3b99a8ca1772d -->
## Check if there are new notifications fo the current user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/checkNotification" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/v1/auth/checkNotification");

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
`GET api/v1/auth/checkNotification`


<!-- END_2f1ab999a7700805bdd3b99a8ca1772d -->

<!-- START_a438d9d57aa776b1d8ed9e2912f86ca2 -->
## Return last 20 notifications for the current user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/pushNotification" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/v1/auth/pushNotification");

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
`GET api/v1/auth/pushNotification`


<!-- END_a438d9d57aa776b1d8ed9e2912f86ca2 -->

#Privacy settings
<!-- START_b09fe239e47dc621e4a25694d3c69739 -->
## Show current user blocklist.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/blockedUsers" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/v1/auth/blockedUsers");

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
`GET api/v1/auth/blockedUsers`


<!-- END_b09fe239e47dc621e4a25694d3c69739 -->

<!-- START_5f5ece6fd927823daf74a04a34801203 -->
## Block a user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/blockUser" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"ea"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/blockUser");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "ea"
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
`POST api/v1/auth/blockUser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the user being blocked

<!-- END_5f5ece6fd927823daf74a04a34801203 -->

<!-- START_1414716f75940f53df99153422eb48b7 -->
## Unblock a user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/v1/auth/unblockUser" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"username":"vero"}'

```

```javascript
const url = new URL("http://localhost/api/v1/auth/unblockUser");

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
}

let body = {
    "username": "vero"
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
`POST api/v1/auth/unblockUser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | the username of the user being unblocked

<!-- END_1414716f75940f53df99153422eb48b7 -->

#Searching
<!-- START_56722b9705faa95bcb9c384fa590df46 -->
## Search for a community or a user.

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/unauth/search" \
    -H "Content-Type: application/json" \
    -d '{"search_content":"omnis"}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/search");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "search_content": "omnis"
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
`GET api/v1/unauth/search`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    search_content | string |  required  | The string the user searching for.

<!-- END_56722b9705faa95bcb9c384fa590df46 -->

#User Information
<!-- START_4993f68128db6f4fdabbbda6c2698e7b -->
## Show user&#039;s private information.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/viewPrivateUserInfo" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/v1/auth/viewPrivateUserInfo");

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
`GET api/v1/auth/viewPrivateUserInfo`


<!-- END_4993f68128db6f4fdabbbda6c2698e7b -->

<!-- START_e52a828f4335e4353e9f5b866f34a01a -->
## Show user&#039;s username.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/auth/getUsername" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL("http://localhost/api/v1/auth/getUsername");

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
`GET api/v1/auth/getUsername`


<!-- END_e52a828f4335e4353e9f5b866f34a01a -->

<!-- START_16249a06257da5ebe2411f938dc1029f -->
## Show user&#039;s public information.

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/unauth/viewPublicUserInfo" \
    -H "Content-Type: application/json" \
    -d '{"username":"quia"}'

```

```javascript
const url = new URL("http://localhost/api/v1/unauth/viewPublicUserInfo");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "quia"
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
`GET api/v1/unauth/viewPublicUserInfo`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | username to show his public info

<!-- END_16249a06257da5ebe2411f938dc1029f -->


