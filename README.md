# jimtervals
PHP MVC mini framework for use with accessing the Intervals API api.myintervals.com

Getting Started 
 1. First you need to have PHP 5.2+ with Curl installed.
 2. You will also need a server with either an SSL Cert installed or if for Development purposes you can use the cacert.pm file in this codebase (which is downloaded from here http://curl.haxx.se/docs/caextract.html )
 3. If you are using cacert.pm then you will need to edit app/config.php in order to update the the constant CA_CERT with the full path to where your certificate is located.
 4. In the same file you will also need to update the constant INTERVALS_API_KEY with your Intervals API Key.
 5. In order to get your Intervals API key you should log in to your Intervals account. Hover over 'options' on the right hand side then click 'My Account' then in the Sub Navigation Bar underneath the main navigation click 'API Access'
 6. If you have a token already generated then copy and paste that into the INTERVALS_API_KEY constant, if not then click 'Generate token'

Polling Intervals API (Intervals API documentation can be found here http://www.myintervals.com/api/ )
 1. The Core functionality resides in two abstract classes
     a.  ControllerCurl located in this file  /app/MVC/controller/controller.curl.php
     b.  ControllerCurlIntervals ( which extends the above) located in this file  /app/MVC/controller/curl/controller.curlIntervals.php
 2. ControllerCurlIntervals is the main file you will be extending if you want to poll a Particular Resource
 3. For instance ControllerCurlIntervalsTask is a concrete class that extends ControllerCurlIntervals that polls the task resource.
 4. In your concrete class pass the API Url that you have constructed to this method $this->setCurlUrl($yourIntervalsApiUrlGoesHere)
 5. for example in ControllerCurlIntervalsTask the method $this->buildUrl() has code that constructs the API Url that gets passed to $this->setCurlUrl()

Naming/Coding Conventions (coming soon)
