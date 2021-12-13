# Research_Assistant

**Introduction**

This program can be used to evaluate the services.csv file to search for countries and return results to the user. 

There are 3 options on the home console screen which include either looking up everything that is in the csv file, all data for particular countries, or the number of services offered by a particular country.

All results are returned in the console into a formatted table, which was achieved through the use of the Console/Table.php package.

**How to Setup**

Follow this link https://github.com/Chris-Y-ates/Research_Assistant.git to download a zip folder of the project files.

Once you have saved this folder in the directory of your choice, the computer terminal needs to be opened up.

The directory then needs to be changed on the terminal into the directory where the folder has been saved.

After this has been completed the program can be run by entering "php start" on the terminal and pressing enter.

Further instructions will then be provided in the terminal to complete any searches that you require.

**Class and Properties**

The code has been split between 2 files in the program directory. The main file is "start.php" which directs the order of operations and takes user input.

All of the main processing and functionality is completed within the separate "classes.php" file, which has a class known as "Table" and within that class there are various properties and methods to compute any results.

All of the variables/properties and functions/methods used in both files have been labelled descriptively to help with readability. An effort has also been made to make comments to guide anyone whilst reading through the files.

**Reusability/Maintainability**

Alot of the code can be reused or altered if further functionality is required. 

For example, if a user would like to see further options on the home screen, the files could be easily changed to accommodate this by either adding further methods in the classes or be resuing them with inheritance.

