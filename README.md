###NOTE: page refers to web pages accessible through the top navigation bar while sub page refers to web pages accessible through the left dashboard navigation


##FOLDERS

#css
contains styling used:
	main styling for the site is style.css
	style for paypal payment form is payment.css

#imgs
contains images of games, credit cards, and backgrounds

#javascripts
contains scripts for main site as well as scripts for payment processing

#papal
contains unused SQL file for payment processing

#Unity
contains game data for intergrating WebGL

#inc
contains files used to build pages throughout the site:
	such files are footer, header, left-navigation (for dashboard),
	modal (for popup of game information), navigation bar

##UTILITY FILES
#these files are used as tools for other files and do not contain any html, css or javascript
config.php :
	sets global variables holding private information used to connect to database or paypal API

databaseconnect.php :
	Class used to connect to mysql and process queries

session_helper.php :
	file containg functions related to sessions.  These functions include a check to see if a user is signed in, and a log out function.

url_helper.php :
	file containing links used throughout the site as well as a function for redirecting the user to another page

initialize.php :
	file that loads the other previously mentioned files to allow different pages to use helper files and global variables and functions.  



##MAIN PAGES
index.php :
	landing page showcasing some top games, the 2 types of memberships, and some frequently asked question

aboutus.php :
	a page talking a little about the company and what it does

##MEMBERSHIP PAYMENT
premiummember.php :
	
regularmember.php :
	


##USERS



##GAMESTORE
allgames.php :
	a sub page of the gamestore page that displays all of our games


##MY DASHBOARD (only available after signin in)
account.php :
	a sub page of the my dashboard page showing the user's account details

angrycube2index.php :
	a sub page (playarea) where users can play Angry Cubes 2

angrycubeindex.php :
	a sub page (playarea) where users can play Angry Cubes


##STATISTICS
graph1.php :
	a sub page (Membership Statistics) showing a pie chart of the types of memberships our users have

graph2.php :
	page where users enter date range before obtaining graph of Installs Per Day

graph2result.php :
	a sub page (Installs Per Day) showing a bar graph of the game installs per day (date range obtained from graph2.php)

	


##UNUSED FILES
error.php :
	page to display custom errors if the user entered an incorrect url.  Not implemented

User.php :
	when using MVC, User.php was the controller handling the processing for user registration and signin verification.  currently code is unused.
