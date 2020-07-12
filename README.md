# Email/SMS Verification

This is a verification task for user using post endpoint. You just make a post request with phone and email fields in the body. You could change the the verification method from configuration variable VERIFICATION_METHOD.

### Prerequisites

You should have `node` and `composer` installed. If you don't, install node from [here](https://nodejs.org/) and composer from [here](https://getcomposer.org/download/).

### Installing
1. Download the zipped file and unzip it or Clone it
    ```sh
    git clone https://github.com/Nouran96/Email-SMS-Verification.git
    ```
2. cd inside the project
    ```sh
    cd Email-SMS-Verification
    ```
3.  Run this command to download composer packages
    ```sh
    composer install
    ```
4. Run this command to download node packages
    ```sh
    npm install
    ```
5. Create a copy of your .env file
    ```sh
    cp .env.example .env
    ```
6. Generate an app encryption key
    ```sh
    php artisan key:generate
    ```
7. Open up the server
    ```sh
    php artisan serve
    ```
8. Change verification method from .env file -> VERIFICATION_METHOD to be either SMS or EMAIL
9. Add your Twilio credentials in .env file -> TWILIO_SID, TWILIO_AUTH_TOKEN

### License
MIT License

Copyright (c) 2020 Nouran Samy Attia

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
