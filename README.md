# Conference room status

The Conference Room Status is a little project (WIP) that enables users to quickly find out wich conference rooms are currently available. The project was built using Laravel and integrates with Google Calendar to build the room schedule.

## Setting Up

After cloning the repo, you must execute the following commands:

    composer install
    npm install
    php artisan key:generate
    chmod 0777 -R storage/
    cp .env.example .env

You must inform your Google Calendar ID (`GOOGLE_CALENDAR_ID`) in the .env file, and the integration e-mail must have read access to this calendar.

Then you must create the dir `storage/app/google-calendar` and put the google auth json inside it. More info about getting this auth json in the [Spatie documentation here](https://github.com/spatie/laravel-google-calendar#how-to-obtain-the-credentials-to-communicate-with-google-calendar).

To build the container:

    docker-compose up -d

Then you can start/stop the container with:

    docker start conference-room-status-app
    docker stop conference-room-status-app

And access it through `http://localhost:81`

## TO-DOs

Right now, all we've got is a Dashboard Controller that is called when acessing `/`. It's using a custom Google Calendar Service to fetch the daily schedule of the default room and that's it.

- [ ] Finish To-do list
