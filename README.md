# User Partner Subscription
## introduction 
this is a prototype project, built with Lumen Framework, to simulate the process of subscribe/unsubscribe 3rd party service provider.
## Endpoints
### 1- subscribe 
`POST`
``/subscribe/{partnerId}``

this endpoint will be used to send the subscription request to the partner, this will : 

1- send the subscription request to the partner and check if response is `ok`

2- add a subscription record inside `subscription` table with status `subscibe pending`

3- add a record to `subscription_history` table with the partner response


### 2- unsubscribe 
`DELETE`
``/subscribe/{partnerId}``

this endpoint will be used to send the unsubscription request to the partner, this will : 

1- send the unsubscription request to the partner and check if response is `ok`

2- update the subscription record inside `subscription` table with status `unsubscibe pending`

3- add a record to `subscription_history` table with the partner response


### 3- subscription callback 
`POST`
``/subscribe/{partnerId}/callback``

this endpoint will work as a callback route that will receive the subscription/unsubscription result from provider and update database records as needed


