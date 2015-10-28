# nxPlaylist

## requirements

[vision](https://github.com/sk222sw/nxplaylist/wiki/vision)

[use cases](https://github.com/sk222sw/nxplaylist/wiki/use-cases)

## testing

[test cases](https://github.com/sk222sw/nxplaylist/wiki/tests)

## runnable version

[nxPlaylist](https://nxplaylist.herokuapp.com/)

## installation

set up your favorite php/apache stack. the application is configured to connect to the current database at clearDB. edit DALBase.php to change database.

## note

clearDB sometimes gives a "max user connections" error when I add more than one post to a table. this seems to be a common problem, but I haven't found a good solution to it (and my code could of course be the problem). if you run into this error please contact me at "sk222sw ät student.lnu.se" or use the login credentials from DALBase.php and delete some or all rows in the Playlist and Track tables.
