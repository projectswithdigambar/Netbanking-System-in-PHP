
# Net Banking Project in PHP

In this project i have develop real world net-banking project. This project is a best simulator for banking learners

## Features

- Secure login and signup system with md5 encryption
- OTP verification 
- Two Step verification with google authenticator
- Admin & user panel
- Withdraw and deposit section
- Money transfer system
- KYC verification
- Email alerts after every transaction
- Saving page
- Request debit card 

## Demo

View live demo of project 👇

https://skybnk.000webhostapp.com  
            
            OR 
Watch video on YouTube 👇   
https://youtu.be/9OP36wzL4tE
## Screenshots
1] Landing Page

![App Screenshot](https://raw.githubusercontent.com/DigambarBC/image-hosting/main/landing%20page.png)

2] Login Page

![App Screenshot](https://raw.githubusercontent.com/DigambarBC/image-hosting/main/login_dash.png)

3] User Dashboard

![App Screenshot](https://raw.githubusercontent.com/DigambarBC/image-hosting/main/php_bank_userdash.png)

## Installation

Install project with git

```bash
  https://github.com/skytech4u/Netbanking-System-in-PHP.git
  cd NetBanking-System-in-PHP
```
## Steps to run Project 

### Xampp Installation
To run this project we need php version 7  

👇 Download supportive version of xampp 👇  
https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.2.33/xampp-windows-x64-7.2.33-1-VC15-installer.exe/download

After Xampp download install it in your pc

### Code Edit Steps  
1. Copy SkyBank Project Folder And Paste in htdocs folder (htdocs found in xampp Setup)  
2. Open SkyBank Folder With VScode or other editor   
3. Create app password in google and copy it (follow the video tutorial -> how to make app password [video link -> https://youtu.be/J4CtP1MBtOE] )  
4. Now Open config.php file which is in root directory     
    Then Add Your Email and App Password in double quotes
    Example 👇
    #### Before Edit
    define("EMAIL", "");  
    define("PASSWORD", "");

    #### After Edit
    define("EMAIL", "skytechcreators@gmail.com");  
    define("PASSWORD", "asdfghjklpoiu");
   
   

5. Now Save File

 
6. Setup Database  

    1] Run xampp.exe  
    2] Start Apache then start mysql  
    3] click on Admin botton in front of mysql OR  type this url in browser (http://localhost/phpmyadmin/)  
    4] Create New Database With The Same Name of (skybank)  
    5] click on import tab  
    6] click on Choose File Button and Select Database file from Project Folder Location : SkyBank > database > skybank.sql  
    7] click on go Button  
    8] refer this tutorial (https://youtu.be/7WUw9J3Xs8Q)  


7. now start project with this link (http://localhost/SkyBank/)  
8. Create Account  
9. To Make Admin Account follow the step given Below  

    1] Create Normal User Account  
    2] Go to mysql Database   
    3] Open login tabel  
    4] to edit any value in database just double click on it. So double click on Status.  
    5] repalce value in the status coloumn with "Super" and in State = 1   

    Example to make admin  
    ![App Screenshot](https://raw.githubusercontent.com/digambar2002/image-hosting/main/dsfile.jpg)

    Note: Without Admin Account User Account Cannot Activate  

10. Now Make User Account. Then Login to Admin Account > click on menue > select Verify Accounts > Click On Verify Button to activate user account
11. Now login As User    

🎉 Now Enjoy Project 😉  

### This is a demo of the project. Some features are removed from project you need to purchase the source code. I will provide you source code at an affordable price. 
#### View Project Price 👇
https://skytech4u.github.io/skytech/