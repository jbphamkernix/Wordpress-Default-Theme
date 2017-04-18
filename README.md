# Project Name
## Installation
1. Create a database for the project and import the DB dump.
(On back-office of the website : Tools -> WP Migrate DB. Then find and replace on URLs and file paths.)

2. Extract folders `uploads` and `plugins` of the release on the folder wp-content **OR** Recover folders `uploads` and `plugins` on the project server.

3. Make copy of the wp-config-sample.php file (in the base dir.) and rename it to wp-config.php.

4. Edit the wp-config.php file.


## Front-End Development
### Start the project
```sh
# Install dependencies (npm install && bower install && gulp)
On folder wp-content/themes/kernix/src -> npm start
```

## Installation THEME
1. Rename the theme folder Kernix to the name's project.

2. Search and replace all on the theme folder the word KERNIX to the name's project.

3. Change screenshot.png

4. Adapt your front-end development to the project.
(Recover the src folder https://github.com/jbphamkernix/Front-End-Framework/)

(Delete after theme's installation -> **'Installation THEME'**)
