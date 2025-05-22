# PHP Phone Book

## Overview

This is a simple phone book web application created as a project for the **Databases** course at university.  
The system provides managing contact information with MySQL database support.

The application includes two main modules:

- **Phone** – Enables searching contacts by name or partial phone number, and adding new contacts.
- **admin** – Handles user authentication with admin-only access.

Also an Entity Relationship Diagram (ERD) is included in the [`docs/ERD.png`](docs/ERD.png) directory.

---

## Features

- **manager Authentication**: Admin can log in through a username and password.
- **Phone Search**: Admin can search for stored phone numbers and related contact names by characters or digits.
- **Add New Entry**: Admin can add new contacts in the phone book.
- **Database**: MySQL

---

## How to Use


1. **Install WampServer**  
   - Download and install [WampServer](https://www.wampserver.com/en/).
   - Move the extracted project folder to:  
     `C:/wamp64/www/`

2. **Install Dependencies**  
   - Use the following commands to install front-end libraries:
     ```bash
     npm install bootstrap@4
     npm install font-awesome
     ```

3. **Connect the Database**  
   - Run WampServer.
   - Open PhpMyAdmin in your browser.
   - Use `root` as the username and leave the password field empty.
   - Import the provided `phonebook.sql` file.

4. **Run the Application**  
   - Visit `http://127.0.0.1/phonebook` in your browser.

5. **Login Credentials**  
   - **Username**: `admin`  
   - **Password**: `123456`

6. **Search Contacts**  
   - Use the search bar to find contacts by entering any character or number.

7. **Add New Contacts**  
   - Fill in the provided form to register a new phone number and contact info.
