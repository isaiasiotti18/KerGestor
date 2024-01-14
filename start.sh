#!/bin/bash

nohup php artisan serve --port=8009 >/dev/null 2>&1

sudo lsof -i:8009 -P -n | grep LISTEN

nohup npm run dev >/dev/null 2>&1
