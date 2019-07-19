##THIS PROGRAMM IS TO START THE SERVER AND CRON JOBS####

#loop for ever####

while true
do
	php artisan schedule:run
	sleep 1
done

echo 'SCHEDULER STARTED'

