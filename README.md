# User Profile Management System

The User Profile Management System is a dynamic web application built using PHP that enables users to register, log in, manage their profile information, and update their social media links. It offers a seamless and secure experience for users to interact with their profiles and stay connected with their peers.

# Unique Features

## 1. Dynamic User Registration and Login

The registration process involves collecting user data such as email, name, password, and mobile number. Upon registration, the data is stored securely in the database. The login mechanism verifies user credentials against the stored data, providing access to the user's profile page upon successful authentication.

## 2. Responsive User Interface

The application's user interface is developed using Bootstrap, ensuring a responsive design that adapts to various screen sizes. This enhances user experience across devices, including desktops, tablets, and mobile phones.

## 3. Profile Picture Upload

Users can upload and update their profile pictures through the images/profile directory. When a new picture is uploaded, the old one is automatically replaced, ensuring that users have a current and personalized profile image.

## 4. Password Recovery

In the event a user forgets their password, they can initiate a password recovery process by clicking the "Forgot password" link. This opens a modal where users can input their email and mobile number. Upon validation, users can set a new password for their account.

## 5. Dynamic Profile Update

Users can easily update their profile information including name, date of birth, mobile number, city, state, and ZIP code. The application calculates the user's age based on their date of birth, dynamically displaying this information on their profile.

## 6. Social Media Link Integration

The system allows users to input their LinkedIn and GitHub profiles. These links are dynamically saved to the database and displayed on the user's profile page, providing a convenient way for users to share their professional and coding portfolios.

# How It Works

Registration: Users navigate to the index.php page, where they can create an account by providing their personal information. The registration process includes client-side and server-side validation to ensure accurate and complete data submission.

## Login:

After registration, users can log in on the same index.php page using their email and password. The system checks the provided credentials against the stored data to grant access to the user's profile.

## Profile Management:

Upon successful login, users are directed to the profile.php page. Here, they can view their existing profile information, update their details, upload a new profile picture, and input their social media links.

## Password Recovery:

Users who forget their password can initiate recovery by clicking the "Forgot password" link. They enter their email and mobile number, and upon validation, they can set a new password.

## Profile Display:

The display.php page dynamically fetches the user's profile information and social media links from the database. This data is displayed in a user-friendly format for other users to view.

# Security Considerations

The application sanitizes user inputs and uses prepared statements to prevent SQL injection attacks.
Passwords are securely hashed before being stored in the database, ensuring user data remains confidential.
Access to sensitive pages is restricted through session management and authentication mechanisms.
User-uploaded files are validated and stored in a designated directory, minimizing security risks.

# Programming Languages

### PHP:

Used for server-side scripting to handle registration, login, profile management, and database interactions.

### HTML:

Utilized for structuring the web pages and presenting content to users.

### CSS:

Applied for styling the web pages and ensuring an aesthetically pleasing user interface.

### JavaScript:

Employed for client-side interactions, form validation, and enhancing user experience.

# Libraries and Frameworks

### Bootstrap:

Used for creating responsive and visually appealing user interfaces. Bootstrap's CSS and JavaScript components ensure a consistent design across devices and screen sizes.

### Alertify:

Provides user-friendly notifications and alerts for a seamless user experience. Alertify enhances the user interaction by displaying success messages, errors, and alerts in a user-friendly manner.

# Database

### MySQL:

The application interacts with a MySQL database to store user information, including registration details, profile data, and social media links. SQL queries are used to retrieve, insert, and update data in the database.

# Dependencies

### Bootstrap:

Used for creating responsive and visually appealing user interfaces.

### Alertify:

Provides user-friendly notifications and alerts for a seamless user experience.
