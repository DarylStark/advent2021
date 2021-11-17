#!/bin/bash

cd backend/vuejs-app

npm run build

cd ../../

cp backend/vuejs-app/dist/js/app.js backend/server/app.js
cp backend/vuejs-app/dist/css/app.css backend/server/app.css

scp backend/server/* dast@dstark.nl:/var/www/dstark.nl/data/advent2021/