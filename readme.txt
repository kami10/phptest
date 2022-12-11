Here is my solutions to the questions asked in the task:

Q1: In order to reduce the number of requests to the API.....please shortly describe one of the options of performing such a refresh?

Answer: In my codes I have implemented a solution for this question. I have implemented a mechanism that program can accept a parameter "fetchFromApi" and if this parameter has a value 
of "yes", the programme first make a request to API and fetch API's data and insert new data them inside the database and then retrive data from the database and return the
result(average word count) to the client.if there is no "fetchFromApi" parameter provided inside the client's request,program will not make a request to the API and it only return the 
result(average word count) based on the persisted data inside the database to the client.

Q2: Make your implementation "production ready" (for example how to support API versioning)?

Answer: In a real world,we usually have a development or product folders inside our programm. our programm is config-based and may run on either development or product environment. 
To make our implementation "production ready", we can provide a config file inside the product folder and inside the config file we can have an array like this:

return [
'ControllerVersions' => [
  'v1' => App\Controller\Version\V1\HomeController::class,
  'v1' => App\Controller\Version\V2\HomeController::class,
 ],
];

This array inside the config file stores the versioning(all the versions our programm support) and based on the client's request we understand about the version that client has requested(we
can get this info from the request's header or queryparams or...) and this config array will call the correspond controller to handle the request.

Q3: how to handle large amounts of user requests against your API?

Answer: One solution is to use a cache system.Forexample,we may use redis cache system in our programm and after getting the request we can store parameters such as male/female or 
active/inactive as a key/value insde a redis cache system and for a short prido of time(forexample next one hour),if we get a request with same parameters,we can read the data from cache
system instead of the database.