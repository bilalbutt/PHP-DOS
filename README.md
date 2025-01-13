
# Resume

A simple PHP based app, which allows limited number of DOS commands to be run in PHP.
## Authors

- [@bilalbutt](https://www.github.com/bilalbutt)


## Features

- Allows use of limited DOS commands to be used.

## Feedback

If you have any feedback, please reach out to us at bilalbutt@gmail.com


## Installation

Unzip to any folder and run the `index.php` file.


		How to add a new command in the PHP DOS

- Add CMD in the `AllowedCmds` array in the `key.js` file.
- Add Checks (if any) in the `Bind event`.
- Add CMD check in the `Ajax_RunCmd` function in the `ajax.js`
- Add CMD file in the `ajax_php.php` file.
- include the help file of the CMD in the `help.php` file.
- Add CMD in the "Cmds" array in the `help.php` file.
- Add CMD file in the `help` folder.
## Roadmap

- Add more CMDs.

## Tech Stack

**Client:** HTML 5, CSS 3, JavaScript, jQuery, AJAX.

**Server:** PHP.

