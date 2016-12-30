# mc-server-status
mc-server-status is a server status module created using the [mcapi.ca](https://mcapi.ca) server API.



mc-server-status allows owners and administrators of small or large servers to easily list or display information about their server without the hastle of dealing with and decoding JSON responses.
Inside this repository, you will find an `example.php` file and `server-status.php` file. The `server-status.php` file is the main API, which should be included on all pages of which the API is used. The `example.php` page shows how the API may be used.
Along with that, the `server-status.php` file also includes comments explaining what most parts of the file do. Although I do not support editing the file without prior knowledge, these comments make it easier to do so.

## Using the API
When using mc-server-status, you must first upload the `server-status.php` file to your web server.
Then, to include and use the mc-server-status module in your own pages, place the following PHP code in the top of your PHP files.
```php
include('server-status.php'); //Here, you will need to make sure that the server-status.php file is in the same directory as the current file. If not, you must specify the path. | ../server-status.php

$data = status(); //Then, to make use of the API, you must set a variable equal to the return value of our function, status(). You can also set the enabled parameter if you wish to include extra statistics. | $data = status('true');
```
After that, you are ready to display your statistics. Because we are using `$data` as our variable, we will grab all our statistics using `$data['statistic']`.



## Displaying Statistics
To display statistics, we will use the PHP echo statement.
```php
echo $data['statistic']; //We will switch out statistic for the actually value.
```
The following is a list of statistics:
- Global
  - `$data['connection']` If the connection returns `error`, you can then use `$data['error']` to grab the error.
  - `$data['error]` Returns the error of the operation if `$data['connection']` returns `error`.
- Both
  - `$data['ip']` Returns the IP of the query.
  - `$data['port']` Returns the port of the query.
  - `$data['online_players']` Returns the maximum amount of players on the server.
  - `$data['max_players']` Returns the current amount of players on the server.
  - `$data['motd']` Returns the MOTD of the server in its regular weird format.
  - `$data['icon']` Returns the HTML to display the server icon as an image.
  - `$data['minecraft']` Returns the Minecraft version required on the server.
- Default
  - `$data['protocol']` Returns the protocol of the server.
  - `$data['friendly_motd']` Returns the MOTD of the server in HTML format. (colored, bolded, etc.)
- Extra
  - `$data['server']` Returns the version of the server's jar file. (Spigot, CraftBukkit, etc.)
  - `$data['plugins']` Can be looped to return every plugin and its version used on the server.
  - `$data['players']` Can be looped to return every player currently on the server.

  

## Credit
Credit for the main website and JSON API goes to [mcapi.ca](https://mcapi.ca).
Website theme and framework by Bootswatch and Bootstrap.
PHP module/function by [mathhulk](https://theartex.net).


