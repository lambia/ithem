# ithem
#
# ithem should be a super-minimalistic CMS
# I'm at the second day of development so now there is almost nothing
# At the moment it works reading a db with a single table.
# There is no back-end yet, and no styling options: just loops and returns.
# Unfortunately, no one can be told what *ithem* is. You have to see it for yourself. (quote)
#
# So.. Installation guide is almost simple:
# 1. Get the code and put it on a LAMP webserver
# 2. Import the provided test-db (ithem_db.sql) on your machine, for example using PMA
#
# How it works, is simple as well..
# 1. index.php inits everything and kickstarts the engine (in the ithem folder)
# 2. in settings.php are stored some settings, for example for db connection